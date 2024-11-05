ZENDIT_API_KEY := "PROVIDE_YOUR_API_KEY"

tests:
	docker run --rm \
	  --user $$(id -u):$$(id -g) \
	  -v ./:/src \
	  -e ZENDIT_API_KEY=$(ZENDIT_API_KEY) \
	  composer bash -c "cd /src && composer install && ./vendor/bin/phpunit test/Api/ZenditApiTest.php"
