#!/bin/bash
wget -O composer-setup.php https://getcomposer.org/installer
php composer-setup.php --install-dir=bin --filename=composer_test
rm composer-setup.php