#!/bin/bash

sudo docker rm -f sofiya-server

sudo docker run -d --name sofiya-server --restart=always --net=local -p 127.0.0.1:9901:80 -e TZ=Europe/Kiev -e MYSQL_PORT_3306_TCP_ADDR=server-db -e MYSQL_USER=root -e MYSQL_PASSWORD=root -e APP_DBNAME=sofiyacity -e APP_ENVIRONMENT=dev -e APP_DOMAIN=dev.sofiya-city.com -v `pwd`:/code sofiya-server