pipeline {
    agent any
    stages {
        stage('Build'){
            steps {
                sh 'build/composer-install.sh'
                sh 'bin/composer install'
            }
        }
        stage('Test'){
            steps {
                sh 'vendor/bin/phpunit -c phpunit.xml.dist'
            }
        }

        stage('Deploy on prod') {
            if (env.BRANCH_NAME == 'master') {
                echo "deploying on production server"
            }
            steps {
                echo "deploying..."
            }
        }
    }
}