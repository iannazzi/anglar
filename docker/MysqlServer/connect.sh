#!/bin/sh

IP=$(docker-machine ip docker-vm)
echo $IP
mysql -u root -p -h $IP --port=3307

#mysql -u root -p -h 192.168.99.100 --port=3307