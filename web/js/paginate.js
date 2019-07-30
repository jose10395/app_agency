$(function () {
    $(".paginate").click(function () {
        if ($(this).hasClass("active")) {
            return false;
        }
        $(".paginate").removeClass("active");
        $(this).addClass("active");
        let examen = $(this).data("examen");
        let numero = $(this).data("numero");
        let examenUsuario = $(this).data("examenusuario");
        $.ajax({
            url: 'paginate',
            type: 'POST',
            data: $('#formanticipo').serialize() + "&examen=" + examen + "&numero=" + numero + "&examenUsuario=" + examenUsuario,
            beforeSend: function () {
                $('body').append('<div class="modal-backdrop fade in" id="loading_fade"></div>');
                //var loading = '<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>';
                //$('#preguntas_test').html(loading);
                $('#preguntas_test').hide();
                $('#loading_puntos').show();
            },
            success: function (html) {
                $('#preguntas_test').html(html);
                $('#loading_puntos').hide();
                $('#preguntas_test').show();
                setTimeout(() => {
                    $('body').find('#loading_fade').remove();
                }, 500);
            },
            error: function (e) {
                console.log('Se produjo un error al traer los datos del usuario');
            }
        });
    });
})