# **Matcha**
A chat and social dating web application written in php and vanilla javascript

## **Getting started**

### **The super easy way**

    ./run.sh

### **The other way**
First build the image: 

    docker build -t matcha:webapp

Then start up the container:

    docker run matcha -p "80:80" --rm --name matcha_app matcha:webapp

Aaand finally run:

    docker exec matcha_app php /app/config/install.php

to configure the aplication's db's and other backend related stuff.
Open browser and navigate to localhost:80 and BAM!!!

