install:
	php app/console doctrine:database:drop --force
	php app/console doctrine:database:create
	php app/console doctrine:schema:create
	rm -rf app/cache/*
	php -d memory_limit=-1 app/console sonata:page:update-core-routes --site=all --no-debug --env=prod
	php -d memory_limit=-1 app/console sonata:page:create-snapshots --site=all --no-debug --env=prod
	php app/console assets:install --relative web
	php app/console sonata:admin:setup-acl --env=prod
	php app/console sonata:admin:generate-object-acl --env=prod

update:
	php app/console doctrine:schema:update --force
	rm -rf app/cache/*
	rm -rf /dev/shm/tdf/cache/*
	php -d memory_limit=-1 app/console sonata:page:update-core-routes --site=all --no-debug --env=prod
	php -d memory_limit=-1 app/console sonata:page:create-snapshots --site=all --no-debug --env=prod
	php app/console assets:install --relative web
	php app/console sonata:admin:setup-acl --env=prod
	php app/console sonata:admin:generate-object-acl --env=prod
cc:
	rm -rf app/cache/*
	rm -rf /dev/shm/tdf/cache/*
	php app/console assets:install --symlink
	php app/console cache:clear --env=prod

route-update:
	php -d memory_limit=-1 app/console sonata:page:update-core-routes --site=all --no-debug
	php -d memory_limit=-1 app/console sonata:page:create-snapshots --site=all --no-debug