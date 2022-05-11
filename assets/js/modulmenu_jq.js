//jQuery search
$(document).ready(function () { //$=jquery tolong carikan document yang ketika  siap jalankan fungsi berikut

    //hilangkan tombol cari
    $('#search').hide(); // jquery carikan id search kemudian dihilangkan


    $('#keyword').on('keyup', function () { //jquery carikan id keyword yang ketika dijalankan event keyup jalankan fungsi berikut

        $('.loader').show(); //jquery tampilkan class loader ketika user mengetik sesuatu


        // Ajax Menggunakan Load
        // $('#modulmenu').load('../ajax/modulmenu.php?keyword=' + $('#keyword').val());//jquery carikan id modulmenu yg ketika diload kirimkan juga data apapun yang diketikkan(val)


        //ajax menggunakan get
        $.get('../ajax/modulmenu.php?keyword=' + $('#keyword').val(), function (data) { //jquery dapatkan datanya dari sumber data kemudian kirimkan apapun yang diketikan/diisikan user kemudian jalankan fungsi berikut
            $('#modulmenu').html(data); //jquery carikan id modulmenu ganti dan rubah dengan data yang dikembalikan oleh ajax

            $('.loader').hide(); //kemudian jquery hilangkan class loader ketika data telah didapatkan

        });


    })
});