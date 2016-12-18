#!/bin/bash

[ -z "$APP_WORKDIR" ] && APP_WORKDIR=`dirname $0`

$APP_WORKDIR/configure.sh

# prepare nginx to run without demonize process (in foreground)
if `cat /etc/nginx/nginx.conf| grep "^\\s*daemon \(on\|off\)" -q`; then
    cat /etc/nginx/nginx.conf |sed "s/\(\\s*daemon \)\(on\|off\)/\\1off/" >/etc/nginx/t && mv /etc/nginx/t /etc/nginx/nginx.conf
else
    echo "daemon off;" >> /etc/nginx/nginx.conf
fi
[ "${APP_ENVIRONMENT}" = "dev"  ] && sed -i 's/sendfile on;/sendfile off;/g' /etc/nginx/nginx.conf

# if this services some how started we must stop them because they will be started using supervisor
systemctl stop supervisor &>/dev/null
systemctl stop nginx &>/dev/null
systemctl stop php7.0-fpm &>/dev/null
systemctl stop cron &>/dev/null

cat "$APP_WORKDIR/etc/supervisord.conf" | sed "s%{APP_WORKDIR}%${APP_WORKDIR}%g" > /etc/supervisor/conf.d/instance.conf
exec /usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf