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

        stage ('Deploy on prod'){
            echo "Deployment script is executed only for master branch"
            when {
                expression {env.BRANCH_NAME == "master" }
            }
            steps {
                echo "deploying ..."
            }
        }
    }
}