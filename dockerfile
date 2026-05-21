FROM php:8.2-cli AS composer
WORKDIR /var/www

# Install system deps and common PHP extensions needed to resolve dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libicu-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    libxml2-dev \
    gnupg \
  && docker-php-ext-install intl pdo pdo_mysql mbstring zip bcmath xml || true \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Use only composer files to leverage Docker cache
COPY composer.json composer.lock ./
# Skip running composer scripts here (they require app files). Run them in final stage.
RUN composer install --no-dev --optimize-autoloader --classmap-authoritative --no-scripts --no-interaction --prefer-dist

FROM node:20-bullseye AS node
WORKDIR /var/www

# Copy only package files to leverage Docker cache
COPY package.json package-lock.json ./
RUN npm ci

# Copy project and build assets
COPY . .
RUN npm run build

FROM php:8.2-fpm

# System deps and PHP extensions required by this project at runtime
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

# Copy vendor built in composer stage
COPY --from=composer /var/www/vendor /var/www/vendor
COPY --from=composer /var/www/composer.lock /var/www/composer.lock
# Copy built frontend assets
COPY --from=node /var/www/public/build /var/www/public/build

WORKDIR /var/www
COPY . .

# Run composer scripts and optimize autoload now that app files are present
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer dump-autoload --optimize || true
RUN php artisan package:discover --ansi || true

# Ensure storage and cache are writable by PHP-FPM
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache || true

EXPOSE 9000
CMD ["php-fpm"]
