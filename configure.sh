#!/bin/bash

[ -z "${APP_WORKDIR}" ] && APP_WORKDIR=`pwd`
[ -z "${APP_DOMAIN}" ] && APP_DOMAIN="sofiya-city.com"
[ -z "${APP_ENVIRONMENT}" ] && APP_ENVIRONMENT="prod"

[ -z "${APP_DBNAME}" ] && APP_DBNAME="sofiyacity"
[ -z "${MYSQL_PORT_3306_TCP_ADDR}" ] && MYSQL_PORT_3306_TCP_ADDR='localhost'
if [ -z "${MYSQL_USER}" ]; then
    _dbuser="root"
    _dbpswd="${MYSQL_ROOT_PASSWORD}"
else
    _dbuser="${MYSQL_USER}"
    _dbpswd="${MYSQL_PASSWORD}"
fi

cat ${APP_WORKDIR}/etc/nginx-host.conf | sed "s%{APP_WORKDIR}%${APP_WORKDIR}%g" | sed "s/{APP_DOMAIN}/${APP_DOMAIN}/g" \
    | sed "s/{APP_ENVIRONMENT}/${APP_ENVIRONMENT}/" > /etc/nginx/sites-enabled/app

rm -f /etc/nginx/sites-enabled/default
if [ "${APP_ENVIRONMENT}" == "dev" ]; then
    cat ${APP_WORKDIR}/etc/nginx-debug-host.conf | sed "s%{APP_WORKDIR}%${APP_WORKDIR}%g" | sed "s/{APP_DOMAIN}/${APP_DOMAIN}/g" \
        | sed "s/{APP_ENVIRONMENT}/${APP_ENVIRONMENT}/" > /etc/nginx/sites-enabled/default
fi

if [ -e "${APP_WORKDIR}/etc/crontab" ]; then
    cat ${APP_WORKDIR}/etc/crontab | sed "s%{APP_WORKDIR}%${APP_WORKDIR}%g" > /etc/cron.d/application
    echo "" >> /etc/cron.d/application
fi

cat ${APP_WORKDIR}/etc/logrotate.conf | sed "s%{APP_WORKDIR}%${APP_WORKDIR}%g" > /etc/logrotate.d/application

chown -R www-data:www-data ${APP_WORKDIR}/storage