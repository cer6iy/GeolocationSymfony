$(document).ready(function(){

    $('select').change(function(){
        var url = $('select option:selected').val();
        window.location.replace(url);
    })
})