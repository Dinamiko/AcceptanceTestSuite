FROM wordpress:4.8.3-php7.1-apache

# Docker Toolbox issue (at least in Mac), fixes owner issue inside container.
RUN usermod -u 1000 www-data
