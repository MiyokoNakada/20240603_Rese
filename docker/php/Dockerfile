FROM php:8.2.12-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  && apt install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
  && docker-php-ext-install -j$(nproc) pdo_mysql zip gd

RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

WORKDIR /var/www

RUN apt update && apt install -y cron
RUN apt update && apt install -y nano
COPY crontab /etc/cron.d/laravel-scheduler
RUN chmod 644 /etc/cron.d/laravel-scheduler
RUN crontab /etc/cron.d/laravel-scheduler
CMD ["cron", "-f"]
