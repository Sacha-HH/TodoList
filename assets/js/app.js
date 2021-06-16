const app = {

    init : function(){
        console.log('init éxécuté');
        tasksList.init();
        newTaskForm.init();
    }
};


document.addEventListener('DOMContentLoaded', app.init);