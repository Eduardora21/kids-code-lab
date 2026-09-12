FROM php:8.2-apache

# Habilitar mod_rewrite de Apache para rutas limpias
RUN a2enmod rewrite

# Copiar el contenido del proyecto
COPY ./src /var/www/html/

EXPOSE 80