$("#sidebar-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $("#logo-responsive").toggle();
});
$('.solonumero').keypress(function(e){
    var key = window.Event ? e.which : e.keyCode;
    return ((key >= 48 && key <= 57));
});