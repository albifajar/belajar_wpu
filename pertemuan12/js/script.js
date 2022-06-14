$(document).ready(function() {
    // hilangkan tombol cari
    $('#tombol-cari').hide();
    $('#pencarian-reset').hide();
    var result = /[^/]*$/.exec(window.location.href)[0];
    console.log(result);
    // event ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        $('.loader').show();
        $('#mynav').hide(); 
        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {

            $('#container').html(data);
            $('.loader').hide();
            $('#pencarian-reset').show();

        });

    });

});