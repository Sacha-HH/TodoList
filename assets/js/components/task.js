const task = {

    // Cette mthode a poiur objectif de poser tous les écouteurs d'evenements
    // sur un element tache, elle va donc recevoir un élement html tache
    bindSingleTaskEvents: function (taskElement) {
        // on cible le titre de la tache
        const taskTitleLabelElement = taskElement.querySelector('.task__title-label');
        taskTitleLabelElement.addEventListener('click', task.handleClickOnTask);
        // on cible l'input
        const taskTitleFieldElement = taskElement.querySelector('.task__title-field');
        taskTitleFieldElement.addEventListener('keydown', task.handleKeydown);
        taskTitleFieldElement.addEventListener('blur', task.handleValidateNewTask);

        const buttonTaskValidate = taskElement.querySelector('.task__button--validate');
        buttonTaskValidate.addEventListener('click', task.handleCompleteTask);

    },

    // Cette methode a pour objectif de masquer le p de la tache et afficher l'input
    handleClickOnTask: function (evt) {
        // ici je remonte a l'élément qui a capté l'event, c'est a dire le <p> (l'intitulé de la tache)
        const taskTitleLabelElement = evt.currentTarget;
        // ici on remonte à la div de classe "task"
        const taskElement = taskTitleLabelElement.closest('.task');
        // j'ajoute la classe "task--edit" qui me permet de masquer le p
        // qui contient l'intitulé de la classe, et afficher l'input
        taskElement.classList.add('task--edit');
        // ci dessous je mets le focus sur l'input de la tache
        taskElement.querySelector('.task__title-field').focus();


    },

    handleKeydown: function (evt) {
        if (evt.key === 'Enter') {
            task.handleValidateNewTask(evt);
        }
    },

    handleValidateNewTask: function (evt) {
        // on récupère l'input
        const taskTitleFieldElement = evt.currentTarget;

        // on récupère la valeur de l'input
        const newTaskTitle = taskTitleFieldElement.value;

        // on remonte a la div de classe task
        const taskElement = taskTitleFieldElement.closest('.task');

        // je cible le p à partir de l'input
        const taskTitleLabelElement = taskTitleFieldElement.previousElementSibling;

        // je change son contenu texte par le contenu de l'input
        taskTitleLabelElement.textContent = newTaskTitle;

        taskElement.classList.remove('task--edit');

    },

    handleCompleteTask: function(evt){
        let buttonElement = evt.currentTarget;
        let taskElement = buttonElement.closest('.task');
        taskElement.classList.remove('task--todo');
        taskElement.classList.add('task--complete');
    }

}