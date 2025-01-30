FROM serversideup/php:8.3-fpm-nginx

# Set default environment variables
ENV PHP_OPCACHE_ENABLE=1 \
    APP_NAME="My App (Default)" \
    DEBIAN_FRONTEND=noninteractive

# Install system dependencies and PHP extensions
USER root
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    build-essential \
    gcc \
    g++ \
    make \
    libicu-dev \
    libexif-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) intl exif gd pdo_mysql mbstring \
    && docker-php-ext-enable intl exif \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js securely
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Copy dependency files first (for caching)
COPY --chown=www-data:www-data . /var/www/html

# Install Composer dependencies
RUN composer install --no-interaction --optimize-autoloader

# Install npm dependencies and build
RUN npm install && npm run build

# Copy the rest of the application
COPY --chown=www-data:www-data . /var/www/html

# Copy and prepare entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Use the entrypoint script
ENTRYPOINT ["docker-entrypoint.sh"]

USER www-data
