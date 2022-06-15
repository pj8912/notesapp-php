#!/bin/bash

if [[ "$OSTYPE" == "linux-gnu"* ]]; then
        
	function package_exists(){
	
		return dpkg -l "$1" &> /dev/null
	}
	
	if package_exists sqlite; then
       	
		echo "Please install sqlite"
	
	else echo "sqlite already installed"

	fi

	if package_exists php; then 
		echo "install PHP"
	else echo "php already installed!"
	
	fi

	FILE=notesapp.db

	if [ -f "$FILE" ]; then
   	 echo "$FILE already exists."
	else 
    	echo "$FILE does not exist."
		echo "creating database 'notesapp'...."
		php create_database.php

	fi

	echo "creating tables if does not exists"
	php notebooks/notebook_table.php
	php notes/notes_table.php
	
		
	echo "Starting php server.."
	php -S localhost:4000

elif [[ "$OSTYPE" == "darwin"* ]]; then
        echo "Machitosh"
elif [[ "$OSTYPE" == "cygwin" ]]; then
        # POSIX compatibility layer and Linux environment emulation for Windows
	echo "cygwin cli"
elif [[ "$OSTYPE" == "msys" ]]; then
        # Lightweight shell and GNU utilities compiled for Windows (part of MinGW)
	echo "msys cli"
elif [[ "$OSTYPE" == "win32" ]]; then
        echo "windows 32"
elif [[ "$OSTYPE" == "freebsd"* ]]; then
        echo "bsd"
else
        echo "OS: unknown"
fi



#php -S localhost:4000
