/**
 * Created by user on 08/06/2026.
 */
document.addEventListener('click', function(e){
    const button = e.target.closest('.btn-editLokasi');
    if(!button) return;
    // bagian scrool usahakan paling atas kalo ga, ga bisa jalan karna ketututp selecktor
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    // console.log(button.dataset);
    document.getElementById('id_lokasi').value = button.dataset.idlokasi;
    document.getElementById('nomor_lemari').value = button.dataset.nomorlemari;
    document.getElementById('nomor_rak').value = button.dataset.nomorrak;
    document.getElementById('nomor_box').value = button.dataset.nomorbox;
    document.getElementById('warna_map').value = button.dataset.warnamap;
    document.getElementById('formInputLokasi').action = BASEURL + '/Admin/Lokasi/updateLokasi';
    document.querySelector('#btnSubmitLokasi span').innerText = 'Update';
});

document.getElementById('btnResetLokasi')
    .addEventListener('click', function(){
        document.getElementById('id_lokasi').value = '';
        document.getElementById('formInputLokasi').action = BASEURL + '/Admin/Lokasi/createLokasi';
        document.querySelector('#btnSubmitLokasi span').innerText = 'Simpan';
    });