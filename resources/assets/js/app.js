try{
    //jQuery
    window.$ = window.jQuery = require('jquery');

    // jQuery UI
    require('jquery-ui/dist/jquery-ui.min.js');

    //popper.js
    window.Popper = require('@popperjs/core');

    //Bootstrap
    require('bootstrap/dist/js/bootstrap.min.js');
    require('bootstrap-select/dist/js/bootstrap-select.min.js');

    //Sweetalert 2
    window.Swal = require('sweetalert2/dist/sweetalert2.all.min');

    //Fontawesome
    require('@fortawesome/fontawesome-free/js/solid.min.js');
    require('@fortawesome/fontawesome-free/js/regular.min.js');
    require('@fortawesome/fontawesome-free/js/brands.min.js');
    require('@fortawesome/fontawesome-free/js/fontawesome.min.js');

    //Summernote
    require('summernote/dist/summernote-bs4.min.js');

    // Chart.js
    require('chart.js/dist/chart.min.js');
} catch(e){
    console.error(e)
}