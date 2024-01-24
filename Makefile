API_CONTAINER_NAME := API_PROJECT
DB_CONTAINER_NAME := DB_PROJECT

restart:
	down up

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

db:
	docker exec -it $(DB_CONTAINER_NAME) bash

composer-install:
	docker exec -it $(API_CONTAINER_NAME) composer install

migrate:
	docker exec -it $(API_CONTAINER_NAME) php artisan migrate --seed

migrate-fresh:
	docker exec -it $(API_CONTAINER_NAME) php artisan migrate:fresh --seed

php:
	docker exec -it $(API_CONTAINER_NAME) bash

