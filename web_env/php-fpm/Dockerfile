FROM php:8.2-fpm

RUN apt-get update && \
  apt-get install -y \
  apt-utils \
  git autoconf \
  libonig-dev \
  bash \
  libxml2-dev \
  curl \
  zlib1g-dev \
  libpng-dev \
  libzip-dev

RUN docker-php-ext-install \
  xml mbstring

# gd

RUN apt-get install -y build-essential libssl-dev libjpeg-dev libfreetype6-dev libmagickwand-dev
RUN pecl install imagick
RUN docker-php-ext-enable imagick

# RUN pecl install \
#   grpc \
#   soap \
#   xsl \
#   zip

# Xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY ./web_env/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Postgres
# RUN apt-get install libpq-dev
# RUN docker-php-ext-install pdo_pgsql 

# MySql
RUN docker-php-ext-install pdo_mysql 

# Install symfony
RUN mkdir -p /usr/local/bin \
  && apt-get -y install sudo wget \
  && wget --quiet https://get.symfony.com/cli/installer -O - | bash \
  && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony \
  && chmod a+x /usr/local/bin/symfony 

# Add User www-data
RUN groupadd -g 1000 -f www-data
RUN adduser -D -H -u 1000 -s /bin/bash www-data -G www-data

# Source code
RUN chown www-data:www-data /var/www
COPY --chown=www-data:www-data ./ /var/www
WORKDIR /var/www

USER www-data

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# RUN composer install --no-interaction

CMD php-fpm

EXPOSE 9000