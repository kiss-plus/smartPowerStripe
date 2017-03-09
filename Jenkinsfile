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

        when {
            expression {env.BRANCH_NAME == "master" }
            stage ('Deploy'){
                steps {
                    echo "deploying ..."
                }
            }
        }
    }
}