

$(document).ready(function(){

    $('#exampleModal').on('show.bs.modal', function(){
        console.log("Modal is being shown");
    });

    $('#exampleModal').on('shown.bs.modal', function(){
        console.log("Modal has been shown");
    });

    $('#exampleModal').on('hide.bs.modal', function(){
        console.log("Modal is being hidden");
    });

    $('#exampleModal').on('hidden.bs.modal', function(){
        console.log("Modal is hidden");
    });

    $('#exampleModal').on('mouseover', function(){
        console.log("Mouse is over this button");
    });

    $('#textbox').on('keydown', function(event){
        console.log(event.originalEvent.key + " Key is pressed")
    });

    $('#textbox').on('keyup', function(event){
        console.log(event.originalEvent.key + " Key is released")
    });

    $('#liveToastBtn').click(function(){
        var el = $('#liveToast');
        new bootstrap.Toast(el).show();
    });

    $('#fetchModal').on('click', function(){
        $.get('/api/demo/modal', function(data, textStatus){
            $('main#mainel').append(data);
        });
    });

    
});