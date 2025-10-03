<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanModel extends Model
{
    protected $table            = 'permintaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tgl_masak', 'menu_makan', 'jumlah_porsi', 'pemohon_id', 'status', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPermintaanWithDetails()
    {
        $builder = $this->db->table($this->table);
        $builder->select('permintaan.*, users.name as pemohon_name');
        $builder->join('users', 'users.id = permintaan.pemohon_id', 'left')->orderBy('permintaan.status', 'ASC')->orderBy('permintaan.created_at', 'DESC');
        $query = $builder->get();
        $permintaanList = $query->getResultArray();

        $permintaanDetailModel = new PermintaanDetailModel();

        foreach ($permintaanList as &$permintaan) {
            $details = $permintaanDetailModel->select('bahan_baku.id, bahan_baku.nama, permintaan_detail.jumlah_diminta, bahan_baku.satuan')->join('bahan_baku', 'bahan_baku.id = permintaan_detail.bahan_id')
                ->where('permintaan_detail.permintaan_id', $permintaan['id'])
                ->get()
                ->getResultArray();
            $permintaan['details'] = $details;
        }

        // dd($permintaanList);

        return $permintaanList;
    }
}
