<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.16
 */
class IdentitasModel extends BaseModel
{
    private $JudulIdentitas = 'Identitas';
    private $TabelWilayah = 'tabel_wilayah';
    private $TabelIdentitas = 'tabel_identitas';
    public function getJudulIdentitas()
    {
        return $this->JudulIdentitas;
    }
    public function panggilDataIdentitas()
    {
        $this->Database->query("SELECT id.*,
        prov.nama AS nama_provinsi,
        kab.nama AS nama_kabupaten,
        kec.nama AS nama_kecamatan,
        kel.nama AS nama_kelurahan
        FROM {$this->TabelIdentitas} id
        LEFT JOIN {$this->TabelWilayah} prov ON prov.kode = id.provinsi_identitas
        LEFT JOIN {$this->TabelWilayah} kab ON kab.kode = id.kabkota_identitas
        LEFT JOIN {$this->TabelWilayah} kec ON kec.kode = id.kecamatan_identitas
        LEFT JOIN {$this->TabelWilayah} kel ON kel.kode = id.kelurahan_identitas");
        return $this->Database->single();
    }
    public function ubahDataIdentitas($ubahDataIdentitas)
    {
        $DateTime = date('Y-m-d H:i:s');
        $this->Database->query("UPDATE {$this->TabelIdentitas} SET
        nama_aplikasi =:nama_identitas,
        nama_perusahaan =:nama_company,
        alamat_perusahaan =:alamat_company,
        kelurahan_identitas =:kel_company,
        kecamatan_identitas =:kec_company,
        kabkota_identitas =:kab_kota_company,
        provinsi_identitas =:prov_company,
        kodepos_identitas =:kodepos_company,
        notelp_perusahaan =:notelp_company,
        email_perusahaan =:email_company,
        fax_perusahaan =:fax_company,
        logo_perusahaan =:logo_company,
        update_at_identitas =:update_at_identitas
        WHERE id_identitas =:id_identitas");
        $this->Database->bind('nama_identitas', $ubahDataIdentitas['nama_identitas']);
        $this->Database->bind('nama_company', $ubahDataIdentitas['nama_company']);
        $this->Database->bind('alamat_company', $ubahDataIdentitas['alamat_company']);
        $this->Database->bind('kel_company', $ubahDataIdentitas['kel_company']);
        $this->Database->bind('kec_company', $ubahDataIdentitas['kec_company']);
        $this->Database->bind('kab_kota_company', $ubahDataIdentitas['kab_kota_company']);
        $this->Database->bind('prov_company', $ubahDataIdentitas['prov_company']);
        $this->Database->bind('kodepos_company', $ubahDataIdentitas['kodepos_company']);

        $this->Database->bind('notelp_company', $ubahDataIdentitas['notelp_company']);
        $this->Database->bind('email_company', $ubahDataIdentitas['email_company']);
        $this->Database->bind('fax_company', $ubahDataIdentitas['fax_company']);
        $this->Database->bind('logo_company', $ubahDataIdentitas['logo_company']);
        $this->Database->bind('update_at_identitas', $DateTime);
        $this->Database->bind('id_identitas', $ubahDataIdentitas['id_identitas']);

        $this->Database->execute();
        return $this->Database->rowCount();
    }
}