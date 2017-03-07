pipeline {
    agent any
    stages {
        stage('Build'){
            steps {
                sh 'build/composerInstall'
                sh 'composer install --env=dev'
            }
        }
        stage('Test'){
            steps {
                sh 'phpunit -c phpunit.xml.dist'
            }
        }
    }
}