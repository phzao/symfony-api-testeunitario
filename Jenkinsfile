pipeline {
    environment {
        CI = 'true'
    }
    stages {
        stage('Stopping all') {
            steps {
                input message: 'Updating develop'
                sh 'docker stop $(docker ps -a -q)'
                sh 'cd symfony-api-testeunitario'
                sh 'git pull'
            }
        }
        stage('Wake up') {
            steps {
                input message: 'Get UP'
                sh 'docker-compose up -d'
            }
        }
    }
}