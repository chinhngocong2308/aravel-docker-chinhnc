for-linux-env:
	echo "UID=$$(id -u)" >> .env
	echo "GID=$$(id -g)" >> .env
install:
	@make build
	@make up
	docker compose exec php composer install
	docker compose exec php cp .env.example .env
	docker compose exec php php artisan key:generate
	docker compose exec php php artisan storage:link
	docker compose exec php chmod -R 777 storage bootstrap/cache
	@make fresh
create-project:
	mkdir src
	docker compose build
	docker compose up -d
	docker compose exec php composer create-project --prefer-dist laravel/laravel .
	docker compose exec php php artisan key:generate
	docker compose exec php php artisan storage:link
	docker compose exec php chmod -R 777 storage bootstrap/cache
	@make fresh

grant-permission:
	docker compose exec php chmod -R 777 storage bootstrap/cache
build:
	docker compose build
up:
	docker compose up --detach
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
down-v:
	docker compose down --remove-orphans --volumes
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
remake:
	@make destroy
	@make install
ps:
	docker compose ps
web:
	docker compose exec web bash
app:
	docker compose exec php bash
tinker:
	docker compose exec php php artisan tinker
dump:
	docker compose exec php php artisan dump-server
test:
	docker compose exec php php artisan test
migrate:
	docker compose exec php php artisan migrate
fresh:
	docker compose exec php php artisan migrate:fresh --seed
seed:
	docker compose exec php php artisan db:seed
dacapo:
	docker compose exec php php artisan dacapo
rollback-test:
	docker compose exec php php artisan migrate:fresh
	docker compose exec php php artisan migrate:refresh
optimize:
	docker compose exec php php artisan optimize
optimize-clear:
	docker compose exec php php artisan optimize:clear
cache:
	docker compose exec php composer dump-autoload --optimize
	@make optimize
	docker compose exec php php artisan event:cache
	docker compose exec php php artisan view:cache
cache-clear:
	docker compose exec php composer clear-cache
	@make optimize-clear
	docker compose exec php php artisan event:clear
	docker compose exec php php artisan view:clear
db:
	docker compose exec db bash
sql:
	docker compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker compose exec redis redis-cli
ide-helper:
	docker compose exec php php artisan clear-compiled
	docker compose exec php php artisan ide-helper:generate
	docker compose exec php php artisan ide-helper:meta
	docker compose exec php php artisan ide-helper:models --write --reset
pint:
	docker compose exec php ./vendor/bin/pint --verbose
pint-test:
	docker compose exec php ./vendor/bin/pint --verbose --test
