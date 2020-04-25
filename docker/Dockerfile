FROM mattrayner/lamp:latest-1804
WORKDIR /
COPY app/ .
RUN php /app/config/install.php
EXPOSE 80
CMD ["/run.sh"]