install:
	php app/console doctrine:database:create
	php app/console doctrine:schema:create
	php app/console doctrine:fixture:load
	rm -rf app/cache/*
	php app/console assets:install --symlink
	php app/console cache:clear --env=prod
	php app/console assetic:dump --env=prod

deploy-configure:
	curl -s http://getcomposer.org/installer | php
	php composer.phar install