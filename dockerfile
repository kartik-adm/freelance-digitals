FROM composer:2 AS composer
WORKDIR /var/www

# Copy only composer files to leverage Docker cache
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --classmap-authoritative

FROM node:20-bullseye AS node
WORKDIR /var/www

# Copy only package files to leverage Docker cache
COPY package.json package-lock.json ./
RUN npm ci

# Copy project and build assets
COPY . .
RUN npm run build

FROM php:8.2-fpm

# System deps and PHP extensions required by this project
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libicu-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    libxml2-dev \
    gnupg \
  && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath intl xml \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy built vendor and frontend assets from previous stages
COPY --from=composer /var/www/vendor /var/www/vendor
COPY --from=composer /var/www/composer.lock /var/www/composer.lock
COPY --from=node /var/www/public/build /var/www/public/build

WORKDIR /var/www
COPY . .

# Ensure storage and cache are writable by PHP-FPM
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache || true

EXPOSE 9000
CMD ["php-fpm"]
