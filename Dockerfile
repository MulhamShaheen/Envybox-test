FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - 
# RUN apt-get install -y nodejs