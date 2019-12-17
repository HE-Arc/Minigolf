# Minigolf

## Docker

Prérequis:
* docker
* docker-compose
* Assurer que les services écoutant sur 8080 et 3306 sont down
  * `netstat | grep PORT`
  * `systemctl stop SERVICE`

Après le clone du repo, pour lancer le projet:

1. `cd Minigolf/backend`
2. `mv .env-example .env`
3. `nano .env`, dans le bloc qui commence par `DB_CONNECTION` faire les changements suivants:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=minigolf
DB_USERNAME=root
DB_PASSWORD=root
```

4. `docker-compose up -d`. À la suite, `$ docker ps` devrait afficher qqch de semblable à:

```shell
CONTAINER ID        IMAGE                  COMMAND                  CREATED             STATUS              PORTS                                        NAMES
2064f40f04cc        nginx:alpine           "nginx -g 'daemon of…"   3 minutes ago       Up 3 minutes        0.0.0.0:443->443/tcp, 0.0.0.0:8080->80/tcp   webserver
2aa482d2c53e        digitalocean.com/php   "docker-php-entrypoi…"   8 minutes ago       Up 8 minutes        9000/tcp                                     app
afc0fbfc2c64        mysql:5.7.22           "docker-entrypoint.s…"   8 minutes ago       Up 4 minutes        0.0.0.0:3306->3306/tcp                       db
```

5. `docker-compose exec app php artisan key:generate`
6. `docker-compose exec app composer update`
9. `docker-compose exec app php artisan migrate:fresh`
10. `docker-compose exec app php artisan db:seed`
11. `docker-compose exec app php artisan jwt:secret`
12. `docker-compose exec app php artisan l5-swagger:generate`
13. test: `http://localhost:8080/api/`

* [Liste de commandes utiles](https://github.com/HE-Arc/SwipeD/wiki/Dockerization#commandes-utiles)

## Frontend

* Dans le folder frontend:
  * `mv .env_example .env`
  * `Ajouter une valeur au field MAPS_API`
  * `npm i`
  * `npm run dev` pour lancer le serveur local 
    * tourne sur http://localhost:3000
