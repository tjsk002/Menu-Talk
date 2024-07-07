FROM php:8.0-fpm

# 종속성 설치

# 필요한 추가 모듈 설치
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip pdo_mysql

# Composer 설치
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 현재 디렉토리의 내용을 /var/www에 복사
COPY . /var/www

# 작업 디렉토리 설정
WORKDIR /var/www

# 포트 9000 노출 및 PHP-FPM 서버 시작
EXPOSE 9000
CMD ["php-fpm"]