/**
 * Created by user on 12/06/2026.
 */

// bagina untuk get wilayah
// $(document).ready(function(){
//    console.log("jQuery jalan!");
// });


$(document).ready(function(){
    // Provinsi -> Kabupaten
    $('#prov_company').on("change", function(){
        // console.log(provId);
        var provId = $(this).val();
//            $.post(BASEURL + "/Identitas/getWilayahAjax",
        $.post(BASEURL + "/Identitas/panggilWilayahAjax",
            {level: 5, idParent: provId},
            function(data){
                // console.log(data);
                var html = '<option value="">Pilih Kabupaten/Kota</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+item.kode+'">'+item.nama+'</option>';
                });
                $("#kab_kota_company").html(html);
                // console.log(data);
            }, "json"
        );
    });

    // Kabupaten -> Kecamatan
    $('#kab_kota_company').on("change", function(){
        var kabId = $(this).val();
        $.post(BASEURL + "/Identitas/panggilWilayahAjax",
            {level: 8, idParent: kabId},
            function(data){
                var html = '<option value="">Pilih Kecamatan</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+item.kode+'">'+item.nama+'</option>';
                });
                $("#kec_company").html(html);
            }, "json"
        );
    });

    // Kecamatan -> Kelurahan
    $('#kec_company').on("change", function(){
        var kecId = $(this).val();
        $.post(BASEURL + "/Identitas/panggilWilayahAjax",
            {level: 13, idParent: kecId},
            function(data){
                var html = '<option value="">Pilih Kelurahan</option>';
                $.each(data, function(i, item){
                    html += '<option value="'+item.kode+'">'+item.nama+'</option>';
                });
                $("#kel_company").html(html);
            }, "json"
        );
    });
});
