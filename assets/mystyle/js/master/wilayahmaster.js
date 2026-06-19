/**
 * Created by user on 10/06/2026.
 */
// bagina untuk get wilayah
// $(document).ready(function(){
//    console.log("jQuery jalan!");
// });

$(document).ready(function(){
    // Provinsi -> Kabupaten
    $('#prov_dokumen').on("change", function(){
        var provId = $(this).val();
        $.post(BASEURL + "/Dokumen/panggilWilayahAjax",
            {level: 5, idParent: provId},
            function(data){
                console.log(data);
                var html = '<option value="">Pilih Kabupaten/Kota</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+item.kode+'">'+item.nama+'</option>';
                });
                $("#kabkota_dokumen").html(html);
            }, "json"
        );
    });

    // Kabupaten -> Kecamatan
    $('#kabkota_dokumen').on("change", function(){
        var kabId = $(this).val();
        $.post(BASEURL + "/Dokumen/panggilWilayahAjax",
            {level: 8, idParent: kabId},
            function(data){
                var html = '<option value="">Pilih Kecamatan</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+item.kode+'">'+item.nama+'</option>';
                });
                $("#kec_dokumen").html(html);
            }, "json"
        );
    });

    // Kecamatan -> Kelurahan
    $('#kec_dokumen').on("change", function(){
        var kecId = $(this).val();
        $.post(BASEURL + "/Dokumen/panggilWilayahAjax",
            {level: 13, idParent: kecId},
            function(data){
                var html = '<option value="">Pilih Kelurahan</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+item.kode+'">'+item.nama+'</option>';
                });
                $("#kel_dokumen").html(html);
            }, "json"
        );
    });
});