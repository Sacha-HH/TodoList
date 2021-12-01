const app = {

    init : function(){
        console.log('init éxécuté');
        newTaskForm.init();
        tasksList.init();
    }
};


document.addEventListener('DOMContentLoaded', app.init);