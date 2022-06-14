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

function previewImage(){
    const gambar = document.querySelector('.gambar')
    const imgPreview = document.querySelector('.img-preview')
    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result
    }
}