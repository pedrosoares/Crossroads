FROM php:7.2

RUN apt-get update
RUN apt-get install -y autoconf pkg-config libssl-dev
RUN pecl install mongodb
RUN docker-php-ext-install bcmath
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

# Install Laravel dependencies
RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
#        libmcrypt-dev \
        libpng-dev \
        libldap2-dev

#RUN pecl install mcrypt-1.0.1
RUN apt-get install -y libpq-dev

RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql pdo pdo_pgsql \
    && docker-php-ext-install iconv \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
#    && docker-php-ext-enable mcrypt \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-install ldap

# utils
RUN apt-get update && \
    apt-get install -y apt-utils freetds-dev sendmail libpng-dev zlib1g-dev

RUN docker-php-ext-configure pdo_dblib --with-libdir=lib/x86_64-linux-gnu \
    && docker-php-ext-install pdo_dblib

CMD php -S 0.0.0.0:80

EXPOSE 80