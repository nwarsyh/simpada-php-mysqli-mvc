<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 18.46
 */
class DepartemenModel extends BaseModel
{
    private $JudulMasterDepartemen = 'Master Departemen';
    private $TabelDepartemen = 'tabel_departemen';
    public function GetJudulMasterDepartemen()
    {
        return $this->JudulMasterDepartemen;
    }
    public function panggilDataDepartemen()
    {
        $this->Database->query("SELECT * FROM {$this->TabelDepartemen}");
        return $this->Database->resultSet();
    }
    public function tambahDataDepartemen($tambahDataDepartemen)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("INSERT INTO {$this->TabelDepartemen}
        VALUES ('', :nama_departemen, :kode_departemen,
        :create_at_departemen, :update_at_departemen)");
        $this->Database->bind('nama_departemen', $tambahDataDepartemen['nama_departemen']);
        $this->Database->bind('kode_departemen', $tambahDataDepartemen['kode_departemen']);
        $this->Database->bind('create_at_departemen', $DateTime);
        $this->Database->bind('update_at_departemen', $DateTime);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ubahDataDepartemen($ubahDataDepartemen)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelDepartemen} SET
        nama_departemen =:nama_departemen,
        kode_departemen =:kode_departemen,
        update_at_departemen =:update_at_departemen
        WHERE id_departemen =:id_departemen");
        $this->Database->bind('nama_departemen', $ubahDataDepartemen['nama_departemen']);
        $this->Database->bind('kode_departemen', $ubahDataDepartemen['kode_departemen']);
        $this->Database->bind('update_at_departemen', $DateTime);
        $this->Database->bind('id_departemen', $ubahDataDepartemen['id_departemen']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function hapusDataDepartemen($hapusDataDepartemen)
    {
        $this->Database->query("DELETE FROM {$this->TabelDepartemen}
        WHERE id_departemen =:hapusDataDepartemen");
        $this->Database->bind('hapusDataDepartemen', $hapusDataDepartemen);
        $this->Database->execute();
        return $this->Database->rowCount();
    }

}