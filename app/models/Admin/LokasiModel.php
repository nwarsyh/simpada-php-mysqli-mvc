<?php
class LokasiModel extends BaseModel
{
    private $JudulMasterLokasi = 'Master Lokasi';
    private $TabelLokasi = 'tabel_lokasi';
    public function GetJudulMasterLokasi()
    {
        return $this->JudulMasterLokasi;
    }
    public function panggilDataLokasi()
    {
        $this->Database->query("SELECT * FROM {$this->TabelLokasi}");
        return $this->Database->resultSet();
    }
    public function tambahDataLokasi($tambahDataLokasi)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelLokasi} VALUES ('',
        :nomor_lemari, :nomor_rak,
        :nomor_box, :warna_map,
        :create_at_lokasi, :update_at_lokasi)");
        $this->Database->bind('nomor_lemari', $tambahDataLokasi['nomor_lemari']);
        $this->Database->bind('nomor_rak', $tambahDataLokasi['nomor_rak']);
        $this->Database->bind('nomor_box', $tambahDataLokasi['nomor_box']);
        $this->Database->bind('warna_map', $tambahDataLokasi['warna_map']);
        $this->Database->bind('create_at_lokasi', $DateTime);
        $this->Database->bind('update_at_lokasi', $DateTime);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataLokasi($ubahDataLokasi)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelLokasi} SET
        nomor_lemari =:nomor_lemari,
        nomor_rak =:nomor_rak,
        nomor_box =:nomor_box,
        warna_map =:warna_map,
        update_at_lokasi =:update_at_lokasi
        WHERE id_lokasi =:id_lokasi");
        $this->Database->bind('nomor_lemari', $ubahDataLokasi['nomor_lemari']);
        $this->Database->bind('nomor_rak', $ubahDataLokasi['nomor_rak']);
        $this->Database->bind('nomor_box', $ubahDataLokasi['nomor_box']);
        $this->Database->bind('warna_map', $ubahDataLokasi['warna_map']);
        $this->Database->bind('update_at_lokasi', $DateTime);
        $this->Database->bind('id_lokasi', $ubahDataLokasi['id_lokasi']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function hapusDataLokasi($hapusDataLokasi)
    {
        $this->Database->query("DELETE FROM {$this->TabelLokasi}
        WHERE id_lokasi =:hapusDataLokasi");
        $this->Database->bind('hapusDataLokasi', $hapusDataLokasi);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}