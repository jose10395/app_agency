$(document).ready(function () { 
    $('.hora').inputmask('99:99'); 
    $('.terminos').change(function(){
        let checked = ($(this).is(":checked"));
        if(checked){
            $('#btnsavereserva').attr("disabled",false);
        }else{
            $('#btnsavereserva').attr("disabled",true);
        }
    })
});

function sumarhora(){
    let horaentrada=$(this).val();
    let calculo = moment(horaentrada,"HH:mm").add(1, 'hours').format('HH:mm');
    $('#hora_fin').val(calculo);
    console.log(calculo)
}

