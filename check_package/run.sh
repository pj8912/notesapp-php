#!/bin/bash


function package_exists(){
	return dpkg -l "$1" &> /dev/null
}
if package_exists sqlite; then
       echo "Please install sqlite"
else echo "sqlite already installed"

fi

