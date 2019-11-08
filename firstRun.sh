php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"

php composer.phar install

cp .env.example .env

php artisan key:generate
php artisan storage:link

npm install
npm run prod

php artisan config:cache
php artisan optimize
php artisan route:cache

php artisan serve