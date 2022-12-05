$(document).ready(() => {
    $('#logo').on('click', (e) =>{
        let obj =$(e.target);
        let counter = obj.attr('data-count');

        if (typeof counter == 'undefined') {
            obj.attr('data-count', 0);
        }
        else {
            if (counter <5)
            obj.attr('data-count', parseInt(counter) + 1);

            else
            window.location =obj.attr('data-url');
        }
    })

});