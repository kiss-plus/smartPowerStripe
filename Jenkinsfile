pipeline {
    agent any
    stages {
        stage('Build'){
            steps {
                sh 'build/composer-install.sh'
                sh 'bin/composer install --env=dev'
            }
        }
        stage('Test'){
            steps {
                sh 'phpunit -c phpunit.xml.dist'
            }
        }
    }
}