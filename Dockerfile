FROM debian:buster

RUN mkdir ./installation && apt-get update && apt-get -y upgrade
ADD ./srcs ./installation
RUN bash ./installation/install.sh
EXPOSE 80 443

#CMD service nginx restart \
#&& service mysql start \
#&& service php7.3-fpm start \
#&& sleep infinity & wait
