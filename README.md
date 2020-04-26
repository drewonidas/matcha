# Matcha
A chat and social dating web application written in php and vanilla javascript

**startup**:
## The super easy way
Run:
> $> ./run.sh

## The other way
1. First build the image: 
> $> docker build -t matcha:webapp

2. Then start up the container:
> $> docker run matcha -p "80:80" --rm --name matcha_app matcha:webapp

3. Aaand finally run:
> $> docker exec matcha_app php /app/config/install.php

to configure the aplication's db's and other backend related stuff.
Open browser and navigate to localhost:80 and BAM!!!

