FROM nginx:latest

MAINTAINER Julien Guittard <julien@shoppytouch.com>

COPY nginx.conf /etc/nginx/
COPY fastcgi.conf /etc/nginx/
COPY shoppytouch-api.conf /etc/nginx/sites-available/

RUN mkdir /etc/nginx/certs
COPY ssl/ssl-params.conf /etc/nginx/snippets/

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN mkdir -p /root/ca/intermediate
COPY ssl/root-openssl.cnf /root/ca/openssl.cnf
COPY ssl/intermediate-openssl.cnf /root/ca/intermediate/openssl.cnf
COPY ssl/domain-openssl.cnf /root/ca/intermediate

RUN apt-get update && apt-get install -y openssl

RUN usermod -u 1000 www-data

COPY entrypoint.sh /opt/entrypoint.sh
RUN chmod a+x /opt/entrypoint.sh

ENTRYPOINT ["/opt/entrypoint.sh"]
CMD ["nginx"]
