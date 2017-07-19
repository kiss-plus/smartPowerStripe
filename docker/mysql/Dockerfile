FROM mysql

ENV MYSQL_ROOT_PASSWORD qazwsx1234

COPY mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
COPY provision.sql /tmp/provision.sql

EXPOSE 3306

CMD service mysql start \
    && mysql -h 127.0.0.1 -u root --password=$MYSQL_ROOT_PASSWORD < /tmp/provision.sql \
    && exec /bin/bash -c "trap : TERM INT; sleep infinity & wait"