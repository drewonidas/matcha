#!/bin/bash
docker build -t matcha -f docker/Dockerfile .
echo "Starting up lamp-stack..."
sleep 0.5
docker run -i -p "80:80" --rm --name matcha_webapp matcha:latest &

sleep 40s
docker exec -t matcha_webapp php /app/config/install.php 
if [ $? -eq 0 ]; then
    echo "Installation complete."
    echo "Running at -> localhost:80"
else
    echo "Installation failed. Do it manually :P"
fi
