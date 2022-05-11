var keyword = document.getElementById('keyword'); //id keyword ditampung di variable
var modulmenu = document.getElementById('modulmenu'); // id modulmenu di tampung di variable


keyword.addEventListener('keyup', function () { //javascipt carikan element keyword kalau ketemu lakukan sesuatu ketika ada sebuah aksi(event) yang dijalankan(keyup) // ketika event(keyup) dijalankan lakukan function berikut 

    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek ajax
    xhr.onreadystatechange = function () { //cek kesiapan ajaxnya menerima sebuah request, jalankan fungsi berikut
        if (xhr.readyState == 4 && xhr.status == 200) { //jika 4 brrti sumbernya ready(siap) dan jika statusnya 200 brrti sumbernya OK
            modulmenu.innerHTML = xhr.responseText; //innerHTML apapun yang ada dalam elemen modul menu tampilkan kemudian ganti dengan respon yang dikembalikan oleh ajax
        }
    }

    //Asynkronus/tidak snikron = Melakukan request ke server  dari sebagian kecil halam yang ingin di tampilkan dngan true

    //eksekusi ajax
    //method-sumberdata-synkronus(false)/asynkronus(true)
    xhr.open('GET', '../ajax/modulmenu.php?keyword=' + keyword.value, true); //location filenya dari admin/index.php //dan kirimkan data url get dari apapun keyword yang diketikkan yang akan ditangkap di modulmenu.php
    xhr.send();

});