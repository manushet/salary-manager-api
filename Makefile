docker-up:
	docker compose up --build -d

docker-exec-php:
	docker exec -it salary-manager-api-php_fpm-1 bash

docker-exec-sql:
	docker exec -it salary-manager-api-mysql-1 bash

docker-down:
	docker compose down --remove-orphans