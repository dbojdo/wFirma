FROM php:7.1

RUN apt-get update && apt-get install -y \
       libmcrypt-dev \
       libpq-dev \
       git \
       subversion \
       zlib1g-dev \
   && docker-php-ext-install iconv zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /var/www/html
CMD composer update -n -o
