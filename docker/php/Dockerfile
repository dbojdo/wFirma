FROM php:5.4

RUN apt-get update && apt-get install -y \
       libmcrypt-dev \
       libpq-dev \
       git \
       subversion \
   && docker-php-ext-install iconv mcrypt zip

RUN pecl install apcu-4.0.11

RUN curl -k https://curl.se/ca/cacert.pem > cacert.pem
RUN apt-get -y install ca-certificates \
    && openssl x509 -outform der -in cacert.pem -out cacert.crt  \
    && cp cacert.crt /usr/local/share/ca-certificates/  \
    && update-ca-certificates && rm -rf cacert.pem

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /var/www/html
CMD composer update -n
