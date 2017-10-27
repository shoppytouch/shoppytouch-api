#!/bin/bash

if [ -z ${DH_SIZE+x} ]
then
  >&2 echo ">> no \$DH_SIZE specified using default"
  DH_SIZE="512"
fi


DH="/etc/nginx/certs/dhparams.pem"

if [ ! -e "$DH" ]
then
  echo ">> seems like the first start of nginx"
  echo ">> doing some preparations..."
  echo ""

  echo ">> generating $DH with size: $DH_SIZE"
  openssl dhparam -out "$DH" $DH_SIZE
fi

# see https://jamielinux.com/docs/openssl-certificate-authority/create-the-root-pair.html

FQDN="wildcard.shoppytouch.local"
PP="iamadummypassphrase"

REQ="$FQDN.csr.pem"
CERT="$FQDN.cert.pem"
KEY="$FQDN.key.pem"

if [ ! -f /etc/nginx/certs/"$FQDN"-bundle.cert.pem ]
then
    # Create the root pair
    echo "** CREATE THE ROOT PAIR"
    cd /root/ca
    mkdir certs crl newcerts private
    chmod 700 private
    touch index.txt.attr
    touch index.txt
    echo 1000 > serial

    # Create the root key
    echo ">> Creating the root key"
    openssl genrsa -aes256 -passout pass:"$PP" -out private/ca.key.pem 4096
    chmod 400 private/ca.key.pem

    # Create the root certificate
    echo ">> Creating the root certificate"
    openssl req -config openssl.cnf \
          -key private/ca.key.pem \
          -passin pass:"$PP" \
          -new -x509 -days 7300 -sha256 -extensions v3_ca \
          -out certs/ca.cert.pem
    chmod 444 certs/ca.cert.pem

    # Verify the root certificate
    # See https://jamielinux.com/docs/openssl-certificate-authority/create-the-root-pair.html#verify-the-root-certificate
    echo ">> Verifying the root certificate"
    openssl x509 -noout -text -in certs/ca.cert.pem


    echo "** CREATE THE INTERMEDIATE PAIR"
    cd /root/ca/intermediate
    mkdir certs crl csr newcerts private
    chmod 700 private
    touch index.txt.attr
    touch index.txt
    echo 1000 > serial
    echo 1000 > crlnumber

    # Create the intermediate pair
    cd /root/ca

    # Create the intermediate key
    echo ">> Creating the intermediate key"
    openssl genrsa -aes256 \
        -passout pass:"$PP" \
        -out intermediate/private/intermediate.key.pem 4096
    chmod 400 intermediate/private/intermediate.key.pem

    # Create the intermediate certificate
    echo ">> Creating the intermediate certificate"
    cd /root/ca
    openssl req -config intermediate/openssl.cnf -new -sha256 \
        -passin pass:"$PP" \
        -key intermediate/private/intermediate.key.pem \
        -out intermediate/csr/intermediate.csr.pem
    openssl ca -config openssl.cnf -extensions v3_intermediate_ca \
        -passin pass:"$PP" \
        -batch \
        -days 3650 -notext -md sha256 \
        -in intermediate/csr/intermediate.csr.pem \
        -out intermediate/certs/intermediate.cert.pem
    chmod 444 intermediate/certs/intermediate.cert.pem

    # Verify the intermediate certificate
    echo ">> Verifying the intermediate certificate"
    openssl x509 -noout -text -in intermediate/certs/intermediate.cert.pem

    # Create the certificate chain file
    cat intermediate/certs/intermediate.cert.pem \
          certs/ca.cert.pem > intermediate/certs/ca-chain.cert.pem
    chmod 444 intermediate/certs/ca-chain.cert.pem

    # Create a key
    ECHO "** SIGN SERVER AND CLIENT CERTIFICATES"
    cd /root/ca
    echo ">> Creating a key"
    openssl genrsa \
          -out intermediate/private/"$KEY" 2048
    chmod 400 intermediate/private/"$KEY"

    # Create a certificate
    echo ">> Creating a certificate"
    openssl req -config intermediate/domain-openssl.cnf \
        -passin pass:"$PP" \
        -key intermediate/private/"$KEY" \
        -new -sha256 -out intermediate/csr/"$REQ"

    openssl ca -config intermediate/domain-openssl.cnf \
        -passin pass:"$PP" \
        -batch \
        -extensions server_cert -days 375 -notext -md sha256 \
        -in intermediate/csr/"$REQ" \
        -out intermediate/certs/"$CERT"
    chmod 444 intermediate/certs/"$CERT"

    cp intermediate/private/"$KEY" /etc/ssl/private/"$KEY"
    cat intermediate/certs/"$CERT" intermediate/certs/ca-chain.cert.pem > /etc/nginx/certs/"$FQDN"-bundle.cert.pem
fi

# cp intermediate/certs/"$CERT" /etc/nginx/certs/"$CERT"

# exec CMD
echo ">> exec docker CMD"
echo "$@"
exec "$@"