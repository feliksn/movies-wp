// custom scripts
$(document).ready(function() { // Start work jQuery--------------------->>>>>>>>>>>>>>>>>>>>

    $('#navpag ul').addClass('pagination justify-content-center');
    $('#navpag li').addClass('page-item');
    $('#navpag a').addClass('page-link');
    $('#navpag .dots').addClass( 'page-link');
    $('#navpag .current').wrap('<a class="page-link active"></a>');
    $('#navpag span.page-link').parent().addClass('page-item disabled');

}); // END work jQuery------------------------------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
