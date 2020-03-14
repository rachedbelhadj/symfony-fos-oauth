# [Symfony 4.4] API REST: OAuth2 + FOS

### Clone project from GitHub

`git clone git@github.com:rachedbelhadj/symfony_fos_oauth.git`

### .env file

`cp env.dest .env`

### Install bundles

`composer install`

### Create schema data base

`bin/console doctrine:schema:update --force`

### Reload fixture data

`bin/console doctrine:fixture:load`

### Creating A Client OAuth

`bin/console fos:oauth-server:create-client --redirect-uri="localhost" --grant-type="password"`

### Server start

`bin/console server:start`
