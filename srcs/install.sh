#! /bin/bash

SERVER_NAME="localhost.com"
INSTALLATION_ROOT='./installation/'
SERVER_CONF_FILE="ft_server"
STATIC_FILE_PATH='/var/www/'${SERVER_CONF_FILE}/
SITES_AVAILABLE="/etc/nginx/sites-available/"
SITES_ENABLED="/etc/nginx/sites-enabled/"
PHPADMIN_FILE_NAME="phpMyAdmin-4.9.3-english"
PACKAGES=("openssl" \
          "nginx" \
          "mariadb-server" \
          "wget" \
          "php7.3" \ 
          "php-mysql" \
          "php-fpm" \ 
          "php-cli" \
          "php-mbstring")


# ==========================================================================================
#                                   Install all packages
# ==========================================================================================

apt-get -y install ${PACKAGES[*]}
service php7.3-fpm start
# ==========================================================================================
#                                       Setup Nginx
# ==========================================================================================

mkdir -p ${STATIC_FILE_PATH}
mv ${INSTALLATION_ROOT}${SERVER_CONF_FILE} ${SITES_AVAILABLE}localhost
ln -s ${SITES_AVAILABLE}localhost ${SITES_ENABLED}localhost

# ==========================================================================================
#                                     Setup database
# ==========================================================================================

service mysql start
mysql -u root < ${INSTALLATION_ROOT}database_conf.sql

# ==========================================================================================
#                                    Install wordpress
# ==========================================================================================

wget https://wordpress.org/latest.tar.gz -P /tmp 
tar xzf /tmp/latest.tar.gz -C ${STATIC_FILE_PATH}
cp ${INSTALLATION_ROOT}wp-config.php ${STATIC_FILE_PATH}wordpress/
chown -R www-data:www-data ${STATIC_FILE_PATH}wordpress
chmod 755 -R ${STATIC_FILE_PATH}wordpress

# ==========================================================================================
#                                    Install myphpadmin
# ==========================================================================================

wget https://files.phpmyadmin.net/phpMyAdmin/4.9.3/phpMyAdmin-4.9.3-english.tar.gz -P /tmp
tar xzf /tmp/phpMyAdmin-4.9.3-english.tar.gz -C ${STATIC_FILE_PATH}
cp ${STATIC_FILE_PATH}${PHPADMIN_FILE_NAME}/config.sample.inc.php ${STATIC_FILE_PATH}${PHPADMIN_FILE_NAME}/config.inc.php
mv ${STATIC_FILE_PATH}${PHPADMIN_FILE_NAME} ${STATIC_FILE_PATH}phpmyadmin

# ==========================================================================================
#                                    Install SSL
# ==========================================================================================
mkdir -p /etc/ssl/certs && mkdir -p /etc/ssl/private
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj '/C=FR/ST=75/L=Paris/O=42/CN=localhost' \
-keyout /etc/ssl/private/localhost.key -out /etc/ssl/certs/localhost.crt
