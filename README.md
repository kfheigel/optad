# Optad app
## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Endpoints](#endpoints)

## General info
This project is simple api service made for optAd360 company

## Technologies
Project is created with:
* PHP
* Symfony
* Docker Compose
* Doctrine
* Psalm Php-cs-fixer

## Setup
To run this project, start with command
```
$ docker-compose up
```
And in the end run in the command line:
```
$ php bin/console make:migration
$ php bin/console doctrine:migrations:migrate
```
To upload to the database schemas.
Then to fill the database with the data run:
```
$ bin/console app:update-db 
```

## Endpoints

| Enpoint            | Method | Description                                                                      |
|--------------------|--------|----------------------------------------------------------------------------------|
| /optad             | POST   | Returns JSON with data                                                           |