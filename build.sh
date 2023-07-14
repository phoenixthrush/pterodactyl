cd /var/www/pterodactyl

php8.1 artisan down
php8.1 artisan migrate --seed --force
yarn install
yarn build:production
php8.1 artisan config:cache
php8.1 artisan view:cache
php8.1 artisan queue:restart
php8.1 artisan up
