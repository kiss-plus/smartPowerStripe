pipeline {
    agent any
    stages {
        stage('Build'){
            sh 'php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"'
            sh 'php -r "if (hash_file('SHA384', 'composer-setup.php') === '55d6ead61b29c7bdee5cccfb50076874187bd9f21f65d8991d46ec5cc90518f447387fb9f76ebae1fbbacf329e583e30') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"'
            sh 'php composer-setup.php --install-dir=bin --filename=composer'
            sh 'php -r "unlink('composer-setup.php');"'
            sh 'bin/composer install'
        }
        stage('Test'){
            steps {
                sh 'phpunit -c phpunit.xml.dist'
            }
        }
    }
}