stage('Deliver for develop'){
    when {
        branch 'develop'
    }
    steps {
        input message: 'Updating develop'
        sh 'cd symfony-api-testeunitario'
        sh 'git pull'
        input message: 'Stopping docker'
        sh 'docker stop $(docker ps -a -q)'
        sh 'docker-compose up -d'
    }
}