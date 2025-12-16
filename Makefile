up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

ssh:
	./vendor/bin/sail shell

artisan:
	./vendor/bin/sail artisan $(cmd)

npm-install:
	./vendor/bin/sail npm install

dev:
	./vendor/bin/sail npm run dev

build:
	./vendor/bin/sail npm run build

optimize:
	./vendor/bin/sail artisan optimize

migrate:
	./vendor/bin/sail artisan migrate

test:
	./vendor/bin/sail artisan test

phpcs:
	./vendor/bin/sail exec laravel.test ./vendor/bin/phpcs
