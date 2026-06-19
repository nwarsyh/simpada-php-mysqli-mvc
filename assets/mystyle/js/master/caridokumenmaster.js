/**
 * Created by user on 10/06/2026.
 */
//    skrip ketik data cari dokumen
function searchDocuments() {
    const input = document.getElementById('dokumenInput').value;
    if (input.length < 5) {
        document.getElementById('suggestions').style.display = 'none';
        return;
    }
    fetch(BASEURL + `/Peminjaman/cariDokumen?pilihDokumen=${encodeURIComponent(input)}`)
        .then(response => response.text()) // ambil raw
.then(text => {
        console.log("RAW RESPONSE:", text);
    let data = [];
    try {
        data = JSON.parse(text);
    } catch(e) {
        console.error("JSON Parse Error:", e);
        return;
    }
    console.log("PARSED DATA:", data);

    let suggestions = document.getElementById('suggestions');
    suggestions.innerHTML = '';
    data.forEach(doc => {
        const option = document.createElement('div');
    option.innerText = `${doc.nomor_dokumen}`;
    option.onclick = () => selectDocument(doc);
    suggestions.appendChild(option);
});
    suggestions.style.display = data.length > 0 ? 'block' : 'none';
})
.catch(error => console.error('Error fetching data:', error));
}
function selectDocument(doc) {
    if (doc.jumlah_dokumen <= 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Opss!!!, Dokumen Tidak Tersedia',
            text: 'Stok Dokumen = 0, Silahkan konfirmasi Administrator',
            confirmButtonText: 'OK'
        });
        return;
    }
    document.getElementById('selectedDocId').value = doc.id_dokumen;
    document.getElementById('nomorDokumen').innerText = doc.nomor_dokumen;
    document.getElementById('namaDokumen').innerText = doc.nama_dokumen;
    document.getElementById('kodeDokumen').innerText = doc.kode_dokumen;
    document.getElementById('kategoriDokumen').innerText = doc.nama_kategori;
    document.getElementById('pengelolaDokumen').innerText = doc.nama_departemen;
    document.getElementById('nomorLemari').innerText = doc.nomor_lemari;
    document.getElementById('nomorRak').innerText = doc.nomor_rak;
    document.getElementById('nomorBox').innerText = doc.nomor_box;
    document.getElementById('warnaMap').innerText = doc.warna_map;
    document.getElementById('provinsiDokumen').innerText = doc.provinsi_dokumen;
    document.getElementById('kabkotaDokumen').innerText = doc.kabkota_dokumen;
    document.getElementById('kecamatanDokumen').innerText = doc.kecamatan_dokumen;
    document.getElementById('kelurahanDokumen').innerText = doc.kelurahan_dokumen;
    document.getElementById('dokumenDetails').style.display = 'block';
    document.getElementById('suggestions').style.display = 'none';
}