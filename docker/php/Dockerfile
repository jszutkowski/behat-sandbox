FROM php:8.0-buster

RUN apt-get -y update \
    && apt-get -y --no-install-recommends install \
    gnupg2 \
    xvfb \
    libxi6 \
    nano \
    libgconf-2-4 \
    libzip-dev \
    mc \
    git \
    zip \
    unzip \
    software-properties-common \
    wget \
    bash \
    openssl \
    curl \
    libtool \
    make \
    g++ \
    autoconf \
    perl \
    libmcrypt-dev \
    libpng-dev \
    sqlite3 \
    librabbitmq-dev

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/bin/composer \
    && php -r "unlink('composer-setup.php');"

RUN pecl install xdebug-3.0.3 \
    && docker-php-ext-enable xdebug

COPY docker/php/php.ini /usr/local/etc/php/php.ini
COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install chromedriver
RUN wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add -
RUN bash -c "echo 'deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main' >> /etc/apt/sources.list.d/google-chrome.list"
RUN apt-get update && apt-get -y install google-chrome-stable

EXPOSE 80
EXPOSE 9000
EXPOSE 9003

WORKDIR /app
