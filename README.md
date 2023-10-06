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
Sample body data(raw/json) 
```
{
    "rider_id": 1,
    "lat": "23.812005737520796",
    "long": "90.370326672366"
}
```
Sample Response 
```
{
    "message": "Rider info inserted successfully",
    "data": {
        "rider_id": 2,
        "lat": "23.812005737520797",
        "long": "90.370326672367",
        "updated_at": "2023-10-06T10:41:31.000000Z",
        "created_at": "2023-10-06T10:41:31.000000Z",
        "id": 4
    }
}
```

- to store rider info ``` http://your-host/api/nearby-riders/{resturantId} ```

Sample Response 
```
{
    "message": "Nearest rider is",
    "data": {
        "rider_id": 1,
        "distance": 0
    },
    "statusCode": 201
}
```
