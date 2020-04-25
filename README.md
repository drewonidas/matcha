# Matcha
A chat and social dating web application written in php and vanilla javascript

**startup**:
I decided to leverage the all doing powers of docker to make things super easy.

from project root, run:
> docker build -t matcha:webapp

to build the image. 

Run
> docker run matcha -p "80:80" --rm --name matcha_app matcha:webapp

will start up a container and run the scripts to start up and configure the lamp stack.

Run:
> docker exec matcha_app php /app/config/install.php

to configure db and other backend related stuff.
Open browser and navigate to localhost:80 and BAM!!!

