# how to start:

- Clone repo ``` [git clone https://github.com/oak-binary/nydttc-edu.git](https://github.com/saiful-4321/bs_test.git) ```.
- Go to directory using ```cd bs_test```
- Install composer by using ```composer install```.
- Copy env using ```cp .env.example .env```
- Setup database and other requirement by updating ```.env```
- Run fresh migration with seed the data using ```php artisan migrate:fresh --seed```
- serve your website using ```php artisan serve```

# API - Endpints.

- to store rider info ``` http://your-host/api/store-rider-info ```
