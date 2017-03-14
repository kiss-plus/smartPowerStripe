node {
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
            ansiblePlaybook(
                playbook: 'jobs/deploy.yml',
                inventory: 'jobs/host',
                limit: 'develop',
                colorized: true,
            )
        }
        stage ('Deploy on test'){
            ansiblePlaybook(
                playbook: 'jobs/deploy.yml',
                inventory: 'jobs/host',
                limit: 'test',
                colorized: true,
            )
        }
    }

    if (env.BRANCH_NAME == 'master') {
            stage ('Deploy on prod'){
                ansiblePlaybook(
                    playbook: 'jobs/deploy.yml',
                    inventory: 'jobs/host',
                    limit: 'prod',
                    colorized: true,
                )
            }
        }
}