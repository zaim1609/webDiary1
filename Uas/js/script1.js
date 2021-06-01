$(document).ready(function(){


    //hilangkan tombol cari
$('#tombol-cari').hide();


//event ketika keyword ditulis

$('#keyword').on('keyup',function(){
    //munculkan icon loading
    $('.loader').show();

    // //ajax menggunakan load

    // $('#container').load('ajax/dokter.php?keyword=' + $('#keyword').val());

    //ajax pake get
    $.get('ajax/dokter.php?keyword=' + $('#keyword').val(),function(data){
        $('#container').html(data);
        $('.loader').hide();
    });
});

});