PORTO && Laravel - For Trengo.

How to install:

- git clone https://github.com/serhii-sv/trengo-challenge
- cd trengo-challenge
- If you would like to use Docker (installing may take some while, first time installing 30-60 min depends on your perfomance):
  - ! PORTS ARE CHANGES TO SPECIFIC, 80->85, 3306->3307 etc.. to do not use exists ports.
  - git submodule add https://github.com/Laradock/laradock.git
  - cd laradock
  - cp ../laradock-env-example .env
  - docker-compose up -d nginx mysql php-fpm phpmyadmin workspace redis
  - docker-compose exec workspace bash
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan db:seed (can take some while, != production has demo data)
- php artisan db:seed --class="App\Containers\Article\Data\Seeders\ArticleCategorySeeder2"
- npm install apidoc
- php artisan apiato:apidoc
- Put these records to /etc/hosts:
  - 127.0.0.1  trengo-challenge.test
  - 127.0.0.1  http://api.trengo-challenge.test:85/v1
  - 127.0.0.1  admin.trengo-challenge.test

Links:

- Site: http://trengo-challenge.test:85
- API documentation (PUBLIC): http://trengo-challenge.test:85/api/documentation/
- Admin: http://admin.trengo-challenge.test:85
- phpmyadmin: http://localhost:8082 (server: mysql, user: default, password: secret)

Tests:

- RUN unit tests command: vendor/bin/phpunit

Main containers:

- Category
- Article
- Vote
- View
