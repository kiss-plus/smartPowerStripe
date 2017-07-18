FROM debian:stretch

ENV PROJECT_DIR /var/www/smartpowerstripe

RUN apt-get update \
    && apt-get install -y \
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

RUN mkdir $PROJECT_DIR \
    && mkdir $PROJECT_DIR/bin \
    && mkdir $PROJECT_DIR/var

WORKDIR $PROJECT_DIR

COPY docker/install-composer.sh bin/install-composer.sh

RUN chmod +x bin/install-composer.sh \
    && bin/install-composer.sh $PROJECT_DIR \
    && rm bin/install-composer.sh

COPY bin/console bin/console
COPY app app
COPY src src
COPY web web
COPY composer.json composer.json
COPY composer.lock composer.lock

RUN bin/composer install
CMD apache2 -DFOREGROUND