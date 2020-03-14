# [Symfony 4.4] API REST: OAuth2 + FOS

### Clone project from GitHub

`git clone git@github.com:rachedbelhadj/symfony_fos_oauth.git`

### .env file

`cp env.dest .env`

### Update database access

DATABASE_NAME="demo"<br/>
DATABASE_USER="root"<br/>
DATABASE_PASSWORD="root"<br/>
DATABASE_PORT=3306<br/>

### Install bundles

`composer install`

### Create schema database

`bin/console doctrine:schema:update --force`

### Reload data fixture

`bin/console doctrine:fixture:load`

### Creating A Client OAuth

`bin/console fos:oauth-server:create-client --redirect-uri="localhost" --grant-type="password"`

### Server start

`bin/console server:start`

### Test Postman

`GET /oauth/v2/token?grant_type=password&client_id=4_14s4dg5udw1wc0ggk48g4s0gksggsog80g08kog4g4s4oggk04&client_secret=6algowe6zc84o40400csg8k004ssk04wwwo800wk8o88k8k8sw&username=admin&password=admin HTTP/1.1
 Host: 127.0.0.1:8000`

![](doc/Postman.png)
