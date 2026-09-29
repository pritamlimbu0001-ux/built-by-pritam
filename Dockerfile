FROM php:8.2-cli

# System packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
        exif \
        pcntl \
        intl \
        zip \
        gd \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

# Install frontend dependencies and build
RUN npm install
RUN npm run build

# Laravel writable directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Railway provides PORT at runtime
EXPOSE 8080

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]