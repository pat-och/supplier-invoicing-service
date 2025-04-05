# --------------------------------#
# Makefile for the "make" command
# --------------------------------#

# ----- Colors -----
GREEN = /bin/echo -e "\x1b[32m\#\# $1\x1b[0m"
RED = /bin/echo -e "\x1b[31m\#\# $1\x1b[0m"

# ----- Programs -----
COMPOSER = composer
PHP = php
SYMFONY = symfony
SYMFONY_CONSOLE = $(PHP) bin/console
PHP_UNIT = $(PHP) bin/phpunit
NPM = npm
MYSQL = mysql
MYSQL_DUMP = mysqldump


## ----- Project -----
cc: # Clear the cache
	@$(call GREEN, "Clearing cache...")
	$(SYMFONY_CONSOLE) cache:clear

dr: ## debug router
	@$(call GREEN, "Debug router...")
	$(SYMFONY_CONSOLE) debug:router

cont: ## make controller
	@$(call GREEN, "Make controller...")
	$(SYMFONY_CONSOLE) make:controller

ent:
	@$(call GREEN, "Make entity...")
	$(SYMFONY_CONSOLE) make:entity

css:
	@$(call GREEN, "Build css...")
	$(SYMFONY_CONSOLE) tailwind:build --watch

dsu: ## Migrate the database
	@$(call GREEN, "update schema database...")
	$(SYMFONY_CONSOLE) doctrine:schema:update --force

db: ## Migrate the database
	@$(call GREEN, "reinit schema database...")
	$(SYMFONY_CONSOLE) d:d:d --force
	$(SYMFONY_CONSOLE) d:d:c
	$(SYMFONY_CONSOLE) doctrine:schema:update --force

ddc: ## crfeate DB and tables
	@$(call GREEN, "create DB and tables...")
	$(SYMFONY_CONSOLE) d:d:c
	$(SYMFONY_CONSOLE) doctrine:schema:update --force

dump:
	@$(call GREEN, "create dump")
	$(MYSQL_DUMP) -u root rootsessions > "D:\Documents\projects\root sessions\database\dump.sql"

usedump:
	@$(call GREEN, "load dump")
	@$(call GREEN, "Initializing database...")
	$(MAKE) db
	@$(call GREEN, "Import data...")
	$(MYSQL) -u root rootsessions < "D:\Documents\projects\root sessions\database\dump.sql"


mess: ## messenger consume
	@$(call GREEN, "messenger consume...")
	$(SYMFONY_CONSOLE) messenger:consume async --time-limit=5
	$(SYMFONY_CONSOLE) messenger:consume failed --time-limit=5


dash: ## make ea dashboard
	@$(call GREEN, "ea dashboard...")
	$(SYMFONY_CONSOLE) make:admin:dashboard

crud: ## make ea crud
	@$(call GREEN, "ea crud...")
	$(SYMFONY_CONSOLE) make:admin:crud


## ----- Help -----
help: ## Display this help
	@$(call GREEN, "Available commands:")
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "3[32m%-30s3[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
