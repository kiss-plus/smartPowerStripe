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
            steps {
                if (env.BRANCH_NAME == 'master') {
                    echo "deploying on production server"
                } else {
                    echo env.BRANCH_NAME + " branch - skipping deploy step"
                }

            }
        }
    }
}