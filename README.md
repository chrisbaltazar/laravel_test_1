# Laravel Test 1 

## Installation 

- Install and configure the DB from the dump file. 
- Run `composer install` 
- Run `php artisan serve` to start the server 
- Visit any of the available routes: 

### Available routes

- GET /api/users/country -> List all active users regardless the country
- GET /api/users/country/{countryCode} -> using any of available country codes in both formats
- UPDATE /api/users/details/{id}/update -> update user details when existing
- DELETE /api/users/{id}/delete -> delete existing user with no details
