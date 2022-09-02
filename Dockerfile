FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update -y && \
    apt-get install apt-utils -y && \
    apt-get upgrade -y && \
    apt-get autoremove -y

RUN apt-get install dialog software-properties-common docker docker-compose make zip sudo -y && \
    add-apt-repository ppa:ondrej/php -y && \
    add-apt-repository ppa:deadsnakes/ppa -y && \
    apt-get update -y 

RUN apt-get install python3.9 -y && \
    update-alternatives --install /usr/bin/python3 python3 /usr/bin/python3.9 1 && \
    apt-get install python3-pip -y && \
    python3 -m pip install wheel flamapy flamapy-fm flamapy-sat

RUN apt-get install curl php8.0 php-cli php-curl php-xml php-mbstring unzip -y && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN apt-get install php-mysql -y


COPY . /home/web/webspl
WORKDIR /home/web/webspl

RUN cp .env.docker .env