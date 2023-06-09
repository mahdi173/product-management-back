## Clone and start project
git clone https://github.com/mahdi173/product-management-back.git

cd product-management-back

run  composer install 

run  cp .env.example .env
 
run   php artisan key:generate

run  ./vendor/bin/sail up

run  ./vendor/bin/sail artisan migrate --seed

To test the application use:

email: userdemo@gmail.com
password: userdemo01