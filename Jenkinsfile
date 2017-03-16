node {
    properties([
          [
            $class: 'jenkins.model.BuildDiscarderProperty',
            strategy: [
              $class: 'LogRotator',
              numToKeepStr: '5'
              ]
          ]
        ])
    stage('Git checkout') {
        checkout scm
    }
    stage('Build'){
        sh 'jobs/install-composer.sh'
        sh 'bin/composer install'
    }
    stage('Test'){
        sh 'vendor/bin/phpunit -c phpunit.xml.dist'
    }
    if (env.BRANCH_NAME == 'develop') {
        stage ('Deploy on develop'){
            sh 'ansible-playbook -i jobs/hosts --limit=develop jobs/deploy.yml'
        }
    }

    if (env.BRANCH_NAME == 'master') {
            stage ('Deploy on prod'){
                ansiblePlaybook(
                    playbook: 'jobs/deploy.yml',
                    inventory: 'jobs/hosts',
                    limit: 'prod',
                    colorized: true,
                )
            }
        }
}