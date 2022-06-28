# sub-manager

Sub manager is a simple application that manages subscribers

## Built With
- Laravel
- Vuejs
- MySQL

## Features
- Subscribers
    - List subsribers
    - Create subsribers
    - Update status
    - View single subscriber

## Getting Started
To run application locally simply follow the instructions below:

#### Prerequisites
You need to have or install the following:
1. Npm
2. Postman
3. Composer
4. Git

#### Installation
- clone repo
    ```
    git clone https://github.com/Nerocodes/sub-manager.git
    ```
- navigate to backend folder
- run installation
    ```
    composer install
    ```
- create a `.env` file with this template using the `.env.example` file
- setup database and cofigure `.env`
- run migration
    ```
    php artisan migrate
    ```
- run seeder
    ```
    php artisan db:seed --class=FieldSeeder
    ```
- start app
    ```
    php artisan start
    ```
- you can now make requests using postman to `localhost:8000/api/`

## Running Tests
To run tests simply run the following command in your git bash or command line
``` 
php artisan test
```
### API

| Endpoints | Functionality |
| --- | --- |
| POST /subscriptions| Create subscription |
| PATCH /subscriptions/:id | Update subscription status |
| GET /subscriptions | Get all subscriptions |
| GET  /subscriptions/:id |Get single subscription |

#### UI Installation
- navigate to frontend folder
- run installation
    ```
    npm install
    ```
- create a `.env` file with this template using the `.env.example` file
- start app
    ```
    npm run dev
    ```

## Author
Oghenero Paul-Ejukorlem 
[@nerocodes](https://www.linkedin.com/in/nerocodes/)
