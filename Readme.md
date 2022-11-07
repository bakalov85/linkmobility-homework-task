# Linkmobility homework task

## Installation

1. Clone repository `git clone https://github.com/bakalov85/linkmobility-homework-task.git`
2. `composer check-platform-reqs`
3. `composer install`
4. Set your database connection in .env file. Example:
`DATABASE_URL="mysql://127.0.0.1:3306/linkmobility?serverVersion=10.9.3-MariaDB-1:10.9.3+maria~ubu2004&charset=utf8mb4&user=root&password=root"`
The project is tested with mariadb 10.9.3, but it should run on earlier versions too.
5. `php bin/console doctrine:database:create`
6. `php bin/console doctrine:schema:update --force`
7. `php bin/console doctrine:fixtures:load`
8. Generate public and private keys for the LexikJWTAuthenticationBundle: `php bin/console lexik:jwt:generate-keypair`
9. Either start the built-in Symfony server with `symfony server:start` or use your own web server. In order to use the `symfony` executable you need to install Symfony CLI: https://symfony.com/download

## Usage

The available Swagger API documentation can be found at https://localhost:8000/api (the 8000 port is needed if you use the Symfony server)
1. Obtain JWT token from https://localhost:8000/jwt/login_check
2. On every request pass the token as a header: Authorization: Bearer {token}
3. If you want to use the Swagger API documentation for making requests (https://localhost:8000/api), click the Authorize button and paste the token there

