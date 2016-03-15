#!/usr/bin/env bash
docker-machine start docker-vm
docker-machine ip docker-vm
docker-machine env docker-vm
# this is not working: eval "$(docker-machine env docker-vm)"