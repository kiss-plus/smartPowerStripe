pipeline {
    agent any
    stages {
        stage('Build'){
            steps {
                sh 'php -r "copy(\"https://getcomposer.org/installer\", \"composer-setup.php\");"'
                sh 'php composer-setup.php --install-dir=bin --filename=composer'
                sh 'php -r "unlink(\"composer-setup.php\");"'
                sh 'bin/composer install'
            }
        }
        stage('Test'){
            steps {
                sh 'phpunit -c phpunit.xml.dist'
            }
        }
    }
}