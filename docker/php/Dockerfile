FROM endroid/docker-php

RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++ php-apc
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl opcache

ADD .gitconfig /root/
ADD application.ini /usr/local/etc/php/conf.d/application.ini
