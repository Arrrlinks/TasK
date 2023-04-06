# Utilisez l'image PHP Apache comme base
FROM php:7.4-apache

# Installez les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Définissez le répertoire de travail
WORKDIR /www/TasK

# Copiez les fichiers de code dans le conteneur
COPY . .

# Exposez le port 80 pour le trafic HTTP
EXPOSE 80
