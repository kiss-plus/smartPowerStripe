node {
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
    if (env.BRANCH_NAME == 'master') {
        stage ('Deploy'){
            echo "deploying"
        }
    }
}