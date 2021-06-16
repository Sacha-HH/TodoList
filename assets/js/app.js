const app = {

    init : function(){
        console.log('init éxécuté');
        tasksList.init();
    }
};


document.addEventListener('DOMContentLoaded', app.init);