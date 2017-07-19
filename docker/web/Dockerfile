FROM debian:stretch

ENV PROJECT_DIR /var/www/smartpowerstripe

RUN apt-get update \
    && apt-get install -y \
    apache2 \
    php \
    php-mysql \
    php-xdebug \
    php-posix \
    php-mbstring \
    php-mcrypt \
    php-dom \
    php-zip \
    git \
    vim \
    wget

RUN a2enmod rewrite

RUN mkdir $PROJECT_DIR \
    && mkdir $PROJECT_DIR/bin \
    && mkdir $PROJECT_DIR/var

WORKDIR $PROJECT_DIR

COPY docker/web/install-composer.sh bin/install-composer.sh

RUN chmod +x bin/install-composer.sh \
    && bin/install-composer.sh $PROJECT_DIR \
    && rm bin/install-composer.sh

COPY bin/console bin/console
COPY app app
COPY src src
COPY web web
COPY composer.json composer.json
COPY composer.lock composer.lock
COPY vendor vendor

RUN bin/composer install

EXPOSE 80

COPY docker/web/virtualHost.conf /etc/apache2/sites-available/000-default.conf

CMD service apache2 restart && exec /bin/bash -c "trap : TERM INT; sleep infinity & wait"