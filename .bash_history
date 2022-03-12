bin/magento setup:upgrade
bin/magento module:enable Poe_Customer
bin/magento se:up
less /magento_code/app/code/Poe/Customer/Block/Customer.php
cat /magento_code/app/code/Poe/Customer/Block/Customer.php
make stop
cd ..
bin/magento se:up
php bin/magento setup:di:compile
php bin/magento cache:clean
bin/magento se:up
make stop
bin/magento se:up
make stop
bin/magento
bin/magento setup:db-schema:upgrade 
bin/magento setup:db-schema:upgrade --convert-old-scripts 
bin/magento se:up
rm -rf ../magento/*
rm -rf ../magento/.*
bin/magento se:up
bin/magento se:up
make stop
