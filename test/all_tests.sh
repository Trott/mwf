#!/bin/bash

phpunit -c php_unit/phpunit.xml

# test in iPhone simulator
cucumber

# test in Firefox
cucumber BROWSER=firefox