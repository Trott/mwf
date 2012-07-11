#!/bin/bash

phpunit -c php_unit/phpunit.xml

# test in iPhone simulator
cucumber

# test in Safari
for feature in `ls features/*.feature`
do
  cucumber BROWSER=firefox $feature
done