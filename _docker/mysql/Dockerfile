FROM mysql:latest

MAINTAINER Julien Guittard <julien@shoppytouch.com>

RUN echo "[mysqld]" >> /etc/mysql/my.cnf
# RUN echo "skip-grant-tables" >> /etc/mysql/my.cnf
RUN echo "bind-address = 0.0.0.0" >> /etc/mysql/my.cnf
RUN echo "sql-mode = ''" >> /etc/mysql/my.cnf

CMD ["mysqld"]