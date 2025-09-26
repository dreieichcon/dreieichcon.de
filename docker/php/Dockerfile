FROM php:8.2-fpm AS base

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip && \
    apt-get clean && rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

FROM base AS dependencies

COPY . .

# Copy the environment file during build
COPY docker/php/.env.docker ./.env

# Copy and setup entrypoint
COPY docker/php/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["/entrypoint.sh"]