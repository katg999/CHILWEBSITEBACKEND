# Use a PHP-FPM and NGINX base image
FROM tiangolo/nginx-php-fpm:latest

# Set working directory
WORKDIR /var/www/html

# Copy Laravel app files
COPY . .

# Copy custom NGINX configuration
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Install required dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Set correct file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose necessary ports
EXPOSE 80 443

# Start NGINX and PHP-FPM
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]

