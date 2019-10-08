# SwipeD

## In a nutshell

SwipeD est une application Android qui a pour but de faire prendre conscience à l'utilisateur de la distance qu'il swipe sur son smartphone. Le projet est découpé en deux parties distinctes:

* Application [Android](https://www.intra.jrosk.ch/projets/SwipeD/)
* Application Web [ici](https://github.com/HE-Arc/SwipeD/wiki/Cahier-des-charges-Backend#backend) et [là](https://github.com/HE-Arc/SwipeD/wiki/Cahier-des-charges-Frontend#application-web)


## Docker

Prérequis:
* docker
* docker-compose

Après le clone du repo, pour lancer le projet:

1. `cd SwipeD/backend`
2. `docker-compose up -d`

à la suite, `$ docker ps` devrait afficher qqch de semblable à:

```shell
CONTAINER ID        IMAGE                  COMMAND                  CREATED             STATUS              PORTS                                        NAMES
2064f40f04cc        nginx:alpine           "nginx -g 'daemon of…"   3 minutes ago       Up 3 minutes        0.0.0.0:443->443/tcp, 0.0.0.0:8080->80/tcp   webserver
2aa482d2c53e        digitalocean.com/php   "docker-php-entrypoi…"   8 minutes ago       Up 8 minutes        9000/tcp                                     app
afc0fbfc2c64        mysql:5.7.22           "docker-entrypoint.s…"   8 minutes ago       Up 4 minutes        0.0.0.0:3306->3306/tcp                       db
```

3. `docker-compose exec app nano .env`
4. Dans le bloc qui commence par `DB_CONNECTION` faire les changements suivants:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=swiped
DB_USERNAME=root
DB_PASSWORD=me demander le mdp (Sol)
```

5. `docker-compose exec app php artisan key:generate`
6. `docker-compose exec app php artisan config:cache`
7. test: `http://localhost:8080`
8. `docker-compose exec db bash`
9.  `docker-compose exec app php artisan migrate`
10. `docker-compose exec app php artisan db:seed`
11. test: `http://localhost:8080/api/swipes`


* [Liste de commandes utiles](https://github.com/HE-Arc/SwipeD/wiki/Dockerization#commandes-utiles)