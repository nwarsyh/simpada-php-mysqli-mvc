/**
 * Created by user on 08/06/2026.
 */
document.addEventListener('click', function(e){
    const button = e.target.closest('.btn-editKategori');
    if(!button) return;
    // bagian scrool usahakan paling atas kalo ga, ga bisa jalan karna ketututp selecktor
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    document.getElementById('id_kategori').value = button.dataset.idkategori;
    document.getElementById('nama_kategori').value = button.dataset.namakategori;
    document.getElementById('kode_kategori').value = button.dataset.kodekategori;
    document.getElementById('formInputKategori').action = BASEURL + '/Admin/Kategori/updateKategori';
    document.querySelector('#btnSubmitKategori span').innerText = 'Update';
});
document.getElementById('btnResetKategori')
    .addEventListener('click', function(){
        document.getElementById('id_kategori').value = '';
        document.getElementById('formInputKategori').action = BASEURL + '/Admin/Kategori/createKategori';
        document.querySelector('#btnSubmitKategori span').innerText = 'Simpan';
    });