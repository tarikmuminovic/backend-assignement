composer-install:
	docker-compose run php bash -c "cd /app/ext; composer install"

doctrine-migrate:
	until docker-compose run php bash -c "cd /app/Uniwise/Symfony; ./console doctrine:schema:update --force"; do sleep 1; done

run-php: composer-install
	@docker-compose exec -uroot php chown -R www-data:www-data /var/cache/symfony
	docker-compose up -d

run: run-php doctrine-migrate

stop:
	docker-compose down
