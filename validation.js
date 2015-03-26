$(document).ready(function(){
    $('#validateCheck').validate({
            errorPlacement: function(error, element) {
                //console.log(element.attr('name'));
            },
            highlight: function(element,errorClass,validClass){
                $(element).removeClass(validClass).addClass(errorClass);
                 $(element).addClass('error');
                
            },
            unhighlight: function(element,errorClass,validClass){
                $(element).removeClass(errorClass).addClass(validClass);
                $(element).addClass('right');
                            
            }
        }).form();

});