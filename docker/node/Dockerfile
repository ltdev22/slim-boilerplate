FROM node:lts

LABEL maintainer="Lykourgos Tsirikos <lykourgos.tsirikos@gmail.com>"

WORKDIR /var/www/html

COPY package*.json tailwind.config.js ./
COPY resources/assets ./resources/assets

RUN npm install
