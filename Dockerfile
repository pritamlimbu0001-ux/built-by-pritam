FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    curl \
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

# ============================================================
# Apache MPM FIX
# Remove EVERY enabled MPM module
# Then enable ONLY prefork
# ============================================================

RUN find /etc/apache2/mods-enabled -type l -name 'mpm_*' -delete \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

# Verify only one MPM exists
RUN echo "=== ENABLED MPM MODULES ===" \
    && find /etc/apache2/mods-enabled -maxdepth 1 -type l -name 'mpm_*' -print \
    && echo "=== APACHE MPM ===" \
    && apache2ctl -M 2>&1 | grep mpm

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

# Install frontend dependencies
RUN npm install

# Build frontend
RUN npm run build

# ============================================================
# Laravel public directory
# ============================================================

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf

RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' \
    > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Laravel writable directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]