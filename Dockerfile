FROM wyveo/nginx-php-fpm:latest

WORKDIR /usr/share/nginx/

RUN apt-get update && apt-get install -qqy git unzip libfreetype6-dev \
        #libjpeg62-turbo-dev \
        #libpng-dev \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/ 


#Instalando Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update


#RUN chmod -R 777 /usr/share/nginx/docker/apache/run.sh

# add root to www groups
#RUN chmod -R 777 /usr/share/nginx/storage

#ENTRYPOINT ["/usr/share/nginx/docker/apache/run.sh"]


