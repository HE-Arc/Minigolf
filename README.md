# SwipeD

## In a nutshell

SwipeD est une application Android qui a pour but de faire prendre conscience à l'utilisateur de la distance qu'il swipe sur son smartphone.

## Docker

Prérequis:
* docker
* docker-compose

1. Cloner le repo
2. `cd` dans le folder backend
3. `docker-compose up -d`

à la suite, `$ docker ps` devrait afficher qqch de semblable à:

```shell
CONTAINER ID        IMAGE                  COMMAND                  CREATED             STATUS              PORTS                                        NAMES
2064f40f04cc        nginx:alpine           "nginx -g 'daemon of…"   3 minutes ago       Up 3 minutes        0.0.0.0:443->443/tcp, 0.0.0.0:8080->80/tcp   webserver
2aa482d2c53e        digitalocean.com/php   "docker-php-entrypoi…"   8 minutes ago       Up 8 minutes        9000/tcp                                     app
afc0fbfc2c64        mysql:5.7.22           "docker-entrypoint.s…"   8 minutes ago       Up 4 minutes        0.0.0.0:3306->3306/tcp                       db
```

4. `docker-compose exec app nano .env`
5. Dans le bloc qui commence par `DB_CONNECTION` faire les changements suivants:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=swiped
DB_USERNAME=root
DB_PASSWORD=me demander le mdp (Sol)
```

6. Enregistrer quiter
7. `docker-compose exec app php artisan key:generate`
8. `docker-compose exec app php artisan config:cache`
9. test: `http://localhost:8080`
10. `docker-compose exec db bash`
11. `mysql -u root -p`
12. `show databases;` devrait afficher:

```shell
+--------------------+
| Database           |
+--------------------+
| information_schema |
| swiped             |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.00 sec)
```

13. `EXIT`
14. `exit`
15. `docker-compose exec app php artisan migrate`
16. `docker-compose exec app php artisan db:seed`
17. test: `http://localhost:8080/api/swipes`

