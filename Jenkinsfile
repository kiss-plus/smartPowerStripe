node {
    stage('Git checkout') {
        checkout scm
    }
    stage('Build'){
        sh 'build/composer-install.sh'
        sh 'bin/composer install'
    }
    stage('Test'){
        sh 'vendor/bin/phpunit -c phpunit.xml.dist'
    }
    if (env.BRANCH_NAME == 'master') {
        stage ('Deploy'){
            echo "deploying"
        }
    }
}