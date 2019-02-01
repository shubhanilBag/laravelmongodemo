# Laravel - AngularJS - MongoDB DEMO
 
## Docker Image
 
https://hub.docker.com/r/shubhanilbag/laravelmongodemo

## Use Without Docker

 - Rename .env.prod to .env 
 - Append these at the end of the file
`DB_DSN=<MONGODB_CONNECTION_URL>`
`DB_DATABASE=<MONGODB_DATABASE>`
- run `composer install`
- run `php artisan migrate`
- run `php artisan serve`

*php7-mongo driver is required to be installed*

## Running as container

`DB_DSN` and `DB_DATABASE` environment variables need to be passed at runtime
