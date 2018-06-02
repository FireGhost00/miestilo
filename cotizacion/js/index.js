$(document).ready(function (){

    $('#cat').on('change',function () {
        var id = $('#cat').val();
        $.ajax({
            type:'POST',
            url: 'cargarCat.php',
            data: {'id': id}
        })
            .done(function (listas_rep) {
            $('#pro').html(listas_rep)
            })
            .fail(function () {
                alert('Hubo un error al mostar los productos ')
            })

    })
})