const task = {

    bindSingleTaskEvents: function (taskElement) {
        // Cette mthode a poiur objectif de poser tous les écouteurs d'evenements
        // sur un element tache, elle va donc recevoir un élement html tache
        const taskTitleFieldElement = taskElement.querySelector('.task__title-label');
        taskTitleFieldElement.addEventListener('click', task.handleClickOnTask);

    },

    handleClickOnTask: function(evt){
        alert('tu viens de cliquer');
    }

}