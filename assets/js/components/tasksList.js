const tasksList = {
    init: function () {
        // ici on voudrait pouvoir ajouter des ecouteurs d'évenements sur toute les taches
        tasksList.bindAllTasksEvents();
    },

    bindAllTasksEvents: function () {

        // On récupère dans un tableau tous les éléments du DOM correspondant aux tâches
        let tasksElementsList = document.querySelectorAll('.tasks .task');
        for (let taskElement of tasksElementsList) {
            // ici j'imagine un composant "task" qui contiendrait une methode 
            // qui va nous servir a ajouter tous les écouteurs d'évents sur UNE TACHE
            task.bindSingleTaskEvents(taskElement);
        }

    }
}