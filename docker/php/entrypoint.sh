#!/bin/bash
set -e

# Copy and rename the Docker environment file
echo "Copying Docker environment file..."
cp ./docker/php/.env.docker .env

# Run Composer only if vendor does not exist
if [ ! -d "vendor" ]; then
    echo "Running composer install..."
    composer install
fi

# Generate Laravel key only if APP_KEY is not set
if grep -q "APP_KEY=" .env && ! grep -q "APP_KEY=base64:" .env; then
    echo "Running php artisan key:generate..."
    php artisan key:generate
fi

# Run fresh migration if DB is ready
if [ -f ".env" ]; then
    # if [ ! -d "docker/db-data" ]; then
        echo "Running php artisan migrate:fresh..."
        php artisan migrate:fresh --seed
    # else
    #    echo "Running php artisan migrate..."
    #    php artisan migrate
    # fi
fi

cd /var/www/html
php artisan serve --host=0.0.0.0 --port=8000