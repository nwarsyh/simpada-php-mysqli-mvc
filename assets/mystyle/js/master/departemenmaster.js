/**
 * Created by user on 08/06/2026.
 */
document.addEventListener('click', function(e){
    const button = e.target.closest('.btn-editDepartemen');
    if(!button) return;
        // bagian scrool usahakan paling atas kalo ga, ga bisa jalan karna ketututp selecktor
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    // console.log(button.dataset);
    document.getElementById('id_departemen').value = button.dataset.iddepartemen;
    document.getElementById('nama_departemen').value = button.dataset.namadepartemen;
    document.getElementById('kode_departemen').value = button.dataset.kodedepartemen;
    document.getElementById('formInputDepartemen').action = BASEURL + '/Admin/Departemen/updateDepartemen';
    document.querySelector('#btnSubmitDepartemen span').innerText = 'Update';

});
document.getElementById('btnResetDepartemen')
    .addEventListener('click', function(){
        document.getElementById('id_departemen').value = '';
        document.getElementById('formInputDepartemen').action = BASEURL + '/Admin/Departemen/createDepartemen';
        document.querySelector('#btnSubmitDepartemen span').innerText = 'Simpan';
    });
