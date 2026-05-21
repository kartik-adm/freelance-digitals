FROM composer:2 AS composer
WORKDIR /var/www

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --classmap-authoritative

FROM node:20-bullseye AS node
WORKDIR /var/www

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build

FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev zip libicu-dev zlib1g-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath intl xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer /var/www/vendor /var/www/vendor
COPY --from=composer /var/www/composer.lock /var/www/composer.lock
COPY --from=node /var/www/public/build /var/www/public/build

WORKDIR /var/www
COPY . .

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
