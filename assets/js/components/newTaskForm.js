const newTaskForm = {
    init: function(){
        let elementForm = document.querySelector('.task--add');
        elementForm.addEventListener('submit', newTaskForm.handleNewTaskFormSubmit);
    },

    handleNewTaskFormSubmit: function(evt){
        evt.preventDefault();
        const templateElement = document.getElementById('empty-task').content.cloneNode(true);
        const elementFormSubmit = evt.currentTarget;
        const titleSubmit = elementFormSubmit.querySelector('input');
        const title = titleSubmit.value;
        const categorySubmit = elementFormSubmit.querySelector('select');
        const category = categorySubmit.value;
        templateElement.querySelector('.task__title-label').textContent = title;
        templateElement.querySelector('.task__category p').textContent = category;
        document.querySelector('.tasks').appendChild(templateElement);

    }
}