// custom scripts
$(document).ready(function() { // Start work jQuery--------------------->>>>>>>>>>>>>>>>>>>>

    $('#navpag ul').attr('class', 'pagination justify-content-center');
    $('#navpag ul li').attr('class', 'page-item');
    $('#navpag ul li a').attr('class', 'page-link');
    $('#navpag ul li span.dots').attr('class', 'page-link');
    $('#navpag ul li span.current').wrap('<a class="page-link active"></a>');
    $('#navpag ul li span.page-link').parent().attr('class', 'page-item disabled');

}); // END work jQuery------------------------------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
