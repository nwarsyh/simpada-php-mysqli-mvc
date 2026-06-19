<?php
class KategoriModel extends BaseModel
{
    private $JudulMasterKategori = 'Master Kategori';
    private $TabelKategori = 'tabel_kategori';
    public function GetJudulMasterKategori()
    {
        return $this->JudulMasterKategori;
    }
    public function panggilDataKategori()
    {
        $this->Database->query("SELECT * FROM {$this->TabelKategori}");
        return $this->Database->resultSet();
    }
    public function tambahDataKategori($tambahDataKategori)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelKategori}
        VALUES ('', :nama_kategori, :kode_kategori,
        :create_at_kategori, :update_at_kategori)");
        $this->Database->bind('nama_kategori', $tambahDataKategori['nama_kategori']);
        $this->Database->bind('kode_kategori', $tambahDataKategori['kode_kategori']);
        $this->Database->bind('create_at_kategori', $DateTime);
        $this->Database->bind('update_at_kategori', $DateTime);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataKategori($ubahDataKategori)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelKategori} SET
        nama_kategori =:nama_kategori,
        kode_kategori =:kode_kategori,
        update_at_kategori =:update_at_kategori
        WHERE id_kategori =:id_kategori");
        $this->Database->bind('nama_kategori', $ubahDataKategori['nama_kategori']);
        $this->Database->bind('kode_kategori', $ubahDataKategori['kode_kategori']);
        $this->Database->bind('update_at_kategori', $DateTime);
        $this->Database->bind('id_kategori', $ubahDataKategori['id_kategori']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function hapusDataKategori($hapusDataKategori)
    {
        $this->Database->query("DELETE FROM {$this->TabelKategori}
        WHERE id_kategori =:hapusDataKategori");
        $this->Database->bind('hapusDataKategori', $hapusDataKategori);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}