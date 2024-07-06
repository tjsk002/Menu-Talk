FROM php:7.2-fpm

# Timezone 설정
ENV TZ Asia/Seoul

# Yarn 설치
RUN apt-get update --fix-missing \
    && apt-get install -y --no-install-recommends nodejs npm \
    && npm install -g yarn

# Composer 설치
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# 필요 패키지 설치
RUN apt-get update --fix-missing \
    && apt-get install -y --no-install-recommends git \
    zip \
    libssl-dev \
    openssl \
    librdkafka-dev \
    libmagickwand-dev \
    imagemagick \
    libzip-dev \
    curl \
    libonig-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install bcmath mysqli soap pdo_mysql gd zip exif \
    bcmath \
    calendar \
    iconv \
    intl \
    pdo \
    pcntl \
    tokenizer \
    xml \
    soap

# PHP 확장 모듈 설치
RUN pecl install -o -f redis \
    && pecl install -o -f rdkafka \
    && pecl install -o -f imagick \
    && rm -rf /tmp/pear \
    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    && echo "extension=rdkafka.so" > /usr/local/etc/php/conf.d/rdkafka.ini \
    && echo "extension=imagick.so" > /usr/local/etc/php/conf.d/imagick.ini