Sofiya City
=========

Build and run
======

MariaDB (DB)
----

Use official mariadb image for creating container with MariaDB

    docker run --name server-db --restart=always --net=local -e MYSQL_ROOT_PASSWORD=mypass -e TERM=xterm -e TZ=Europe/Kiev -d mysql

Start interactive mysql console for this instance:

    docker exec -ti server-db mysql -pmypass

Create the database if it needed.

    docker exec -ti server-db mysql -u root -proot -e 'CREATE DATABASE `sofiyacity` /*!40100 DEFAULT CHARACTER SET utf8 */;'

For tests

    docker exec -ti server-db mysql -proot -e 'CREATE DATABASE `sofiyacity_test` /*!40100 DEFAULT CHARACTER SET utf8 */;'

Initialise DB

    docker run --rm -ti -v `pwd`/etc/init_database.sql:/init_database.sql --net=local -e TERM=xterm -e TZ=Europe/Kiev mariadb /bin/sh -c "mysql -h server-db -u root -proot sofiyacity < /init_database.sql"

Updating init_database.sql file

    docker run --rm -ti -v `pwd`/etc/init_database.sql:/init_database.sql --net=local -e TERM=xterm -e TZ=Europe/Kiev mariadb /bin/sh -c "mysqldump -h server-db -u root -proot sofiyacity > /init_database.sql"

App
----

### Build:

You may want use different tag from then `docker.77xy.net/psup-ll/notifier:latest`, but it official tag, used for distribute this service

    docker build --rm -t sofiya-server .

If build fails due to abscence of some ubuntu packages (ubuntu unable do download some packages) run build without cache:

    docker build --rm --no-cache -t sofiya-server .

### Run (web, app)

You may use docker network instead of linking app and db containers:

    docker network create -d bridge local
    docker run -d --name sofiya-server --restart=always --net=local -p 127.0.0.1:9901:80 -e TZ=Europe/Kiev -e MYSQL_PORT_3306_TCP_ADDR=server-db -e MYSQL_USER=root -e MYSQL_PASSWORD=root -e APP_DBNAME=sofiyacity -e APP_ENVIRONMENT=dev -e APP_DOMAIN=dev.sofiya-city.com -v `pwd`:/code sofiya-server

### Run tests

For historical reasons tests can be properly run only inside fully configured and started container with application
either using web runner (phpstorm) or using cli:

    docker exec -t sofiya-server /code/vendor/phpunit/phpunit/phpunit -c app

### Execute app command (application console)

    docker exec -ti sofiya-server app/console

### Envirnment parameters that can be passed to a container:

* MYSQL_PORT_3306_TCP_ADDR -- address of the database server
* MYSQL_USER -- database user
* MYSQL_PASSWORD -- database user password
* MYSQL_ROOT_PASSWORD -- database user root password
* APP_DBNAME -- the name of database that should be used by the instance
* APP_ENVIRONMENT (dev|prod) -- the name of environment, and configuration for the instance
* APP_DOMAIN -- host name of the psup-notifier server

All code of the project placed in `/code` inside the container.

### Composer

    docker pull composer/composer

    docker run --rm -v $(pwd):/app composer/composer install

### NPM
    docker exec -ti sofiya-server npm install -g gulp && gulp
