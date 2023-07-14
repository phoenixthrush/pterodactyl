cd /var/www/pterodactyl

# change if needed
alias php="php8.1"

php artisan down
php artisan migrate --seed --force
yarn install
yarn build:production
php artisan config:cache
php artisan view:cache
php artisan queue:restart
php artisan up
