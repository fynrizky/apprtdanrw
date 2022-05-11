// popover using JQuery Data Warga
$(document).ready(function () { //jquery carikan dokumen ketika siap jalankan fungsi berikut
    $('.data-warga').popover({ //jquery carikan class data-warga ketika di popover
        title: 'Data Kepala Keluarga', //kasih title
        content: fetchData, //set content //dr function fetchData
        html: true, //set html
        placement: 'right' //tampilan popovernya
    }).on("show.bs.popover", function () { //ketika di popover gunakan event tampil/show.bs.popover, jalankan fungsi berikut
        $(this).data("bs.popover").tip().css("max-width", "700px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("max-height", "200px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("overflow-y", "auto"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css

    });
    // .mouseover(function () { //ketika event mouseover diarahkan atau digunakan jalankan fungsi berikut
    //     $(this).popover('show'); //jquery this=class data-warga, ketika di popover tampilkan
    // }).mouseout(function () { //ketika event mouseout tidak diarahkan jalankan fungsi berikut

    //     $(this).popover('hide'); //jquery this=class data-warga, ketika mouseout hilangkan popovernya
    // });

    function fetchData() { //membuat method function fetchData
        var fetch_data = ''; //membuat var fetch_data yang kosong
        var element = $(this); //membuat var element yaitu isinya JQuery(this)=>class data-warga
        var id = element.attr("id"); //membuat var id yang isinya element atribut id
        $.ajax({ //jquery jalankan fungsi ajax
            url: "../ajax/fetch_data.php", //sumber data yang akan diambil
            method: "POST", //methodnya POST
            async: false, //asyncronus mengambil sebagian data = Tidak
            data: { //datanya yaitu var id yang isinya attr id
                id: id //yang akan di tangkap yaitu propertynya
            },
            success: function (data) { //jika sukses jalankan fungsi berikut berikan dan dapatkan parameter
                fetch_data = data; //var fetch_data yang kososng diisi dgn data yang diambil dari sumber data menggunakan ajax
            }
        });
        return fetch_data; // kembalikan ke fetch_data
    }
});

// popover using JQuery Data Kartu keluarga
$(document).ready(function () { //jquery carikan dokumen ketika siap jalankan fungsi berikut
    $('.data-kk').popover({ //jquery carikan class data-warga ketika di popover
        title: 'Data Anggota Keluarga', //kasih title
        content: fetchData, //set content //dr function fetchData
        html: true, //set html
        placement: 'right' //tampilan popovernya
    }).on("show.bs.popover", function () { //ketika di popover gunakan event tampil/show.bs.popover, jalankan fungsi berikut
        $(this).data("bs.popover").tip().css("max-width", "700px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("max-height", "200px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("overflow-y", "auto"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css

    });
    //.mouseover(function () { //ketika event mouseover diarahkan atau digunakan jalankan fungsi berikut
    //$(this).popover('show'); //jquery this=class data-warga, ketika di popover tampilkan
    //}).mouseout(function () { //ketika event mouseout tidak diarahkan jalankan fungsi berikut

    // $(this).popover('hide'); //jquery this=class data-warga, ketika mouseout hilangkan popovernya
    //});

    function fetchData() { //membuat method function fetchData
        var fetch_data = ''; //membuat var fetch_data yang kosong
        var element = $(this); //membuat var element yaitu isinya JQuery(this)=>class data-warga
        var id = element.attr("id"); //membuat var id yang isinya element atribut id
        $.ajax({ //jquery jalankan fungsi ajax
            url: "../ajax/fetch_data_kk.php", //sumber data yang akan diambil
            method: "POST", //methodnya POST
            async: false, //asyncronus mengambil sebagian data = Tidak
            data: { //datanya yaitu var id yang isinya attr id
                idkk: id //yang akan di tangkap yaitu propertynya
            },
            success: function (data) { //jika sukses jalankan fungsi berikut berikan dan dapatkan parameter
                fetch_data = data; //var fetch_data yang kososng diisi dgn data yang diambil dari sumber data menggunakan ajax
            }
        });
        return fetch_data; // kembalikan ke fetch_data
    }
});

// popover using JQuery Data Surat Pengantar
$(document).ready(function () { //jquery carikan dokumen ketika siap jalankan fungsi berikut
    $('.data-sp').popover({ //jquery carikan class data-warga ketika di popover
        title: 'Data Surat Pengantar', //kasih title
        content: fetchData, //set content //dr function fetchData
        html: true, //set html
        placement: 'left' //tampilan popovernya
    }).on("show.bs.popover", function () { //ketika di popover gunakan event tampil/show.bs.popover, jalankan fungsi berikut
        $(this).data("bs.popover").tip().css("max-width", "700px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("max-height", "200px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("overflow-y", "auto"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css

    }).mouseover(function () { //ketika event mouseover diarahkan atau digunakan jalankan fungsi berikut
        $(this).popover('show'); //jquery this=class data-warga, ketika di popover tampilkan
    }).click(function () { //ketika event mouseout tidak diarahkan jalankan fungsi berikut

        $(this).popover('hide'); //jquery this=class data-warga, ketika mouseout hilangkan popovernya
    });

    function fetchData() { //membuat method function fetchData
        var fetch_data = ''; //membuat var fetch_data yang kosong
        var element = $(this); //membuat var element yaitu isinya JQuery(this)=>class data-warga
        var id = element.attr("id"); //membuat var id yang isinya element atribut id
        $.ajax({ //jquery jalankan fungsi ajax
            url: "../ajax/fetch_data_sp.php", //sumber data yang akan diambil
            method: "POST", //methodnya POST
            async: false, //asyncronus mengambil sebagian data = Tidak
            data: { //datanya yaitu var id yang isinya attr id
                id: id
            },
            success: function (data) { //jika sukses jalankan fungsi berikut berikan dan dapatkan parameter
                fetch_data = data; //var fetch_data yang kososng diisi dgn data yang diambil dari sumber data menggunakan ajax
            }
        });
        return fetch_data; // kembalikan ke fetch_data
    }
});

// popover using JQuery Data Kelahiran
$(document).ready(function () { //jquery carikan dokumen ketika siap jalankan fungsi berikut
    $('.data-kelahiran').popover({ //jquery carikan class data-warga ketika di popover
        title: 'Data Orang Tua Dan Keluarga', //kasih title
        content: fetchData, //set content //dr function fetchData
        html: true, //set html
        placement: 'right' //tampilan popovernya
    }).on("show.bs.popover", function () { //ketika di popover gunakan event tampil/show.bs.popover, jalankan fungsi berikut
        $(this).data("bs.popover").tip().css("max-width", "700px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("max-height", "200px"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css
        $(this).data("bs.popover").tip().css("overflow-y", "auto"); //jQuery carikan class data warga, yang datanya di popover.kemudian set tip.kemudian set css

    });
    // .mouseover(function () { //ketika event mouseover diarahkan atau digunakan jalankan fungsi berikut
    //     $(this).popover('show'); //jquery this=class data-warga, ketika di popover tampilkan
    // }).click(function () { //ketika event mouseout tidak diarahkan jalankan fungsi berikut

    //     $(this).popover('hide'); //jquery this=class data-warga, ketika mouseout hilangkan popovernya
    // });

    function fetchData() { //membuat method function fetchData
        var fetch_data = ''; //membuat var fetch_data yang kosong
        var element = $(this); //membuat var element yaitu isinya JQuery(this)=>class data-warga
        var idkelahiran = element.attr("id"); //membuat var id yang isinya element atribut id
        $.ajax({ //jquery jalankan fungsi ajax
            url: "../ajax/fetch_data_kelahiran.php", //sumber data yang akan diambil
            method: "POST", //methodnya POST
            async: false, //asyncronus mengambil sebagian data = Tidak
            data: { //datanya yaitu var id yang isinya attr id
                idlahir: idkelahiran
            },
            success: function (data) { //jika sukses jalankan fungsi berikut berikan dan dapatkan parameter
                fetch_data = data; //var fetch_data yang kososng diisi dgn data yang diambil dari sumber data menggunakan ajax
            }
        });
        return fetch_data; // kembalikan ke fetch_data
    }
});