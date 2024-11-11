<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model{

    protected $DBGroup          = 'default';
    protected $table            = 'rooms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'number',
        'roomname_id',
        'roomfood_id',
        'roomcancelationcharges_id',
        'smoking',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
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

    public function getRoomsWithCategories() {
        return $this->db->table('rooms') // Pastikan Anda menggunakan nama tabel yang benar
            ->select('rooms.*, pricings.name AS pricings_name') // Pilih kolom yang diinginkan
            ->join('pricings', 'rooms.roomname_id = pricings.id', 'left') // Join dengan tabel pricings
            ->get() // Ambil hasil
            ->getResult(); // Ambil hasil sebagai array objek
    }

    public function getTotalRooms($status)
    {
        return $this->where('status', $status)->countAllResults();
    }

    public function createBookingForm() {
        $db = \Config\Database::connect();
        $roomCategories = $db->table('rooms')
            ->select('rooms.id AS room_id, pricings.name AS category_name, rooms.number AS room_name') // Ambil nama ruangan dan nama kategori
            ->join('pricings', 'rooms.roomname_id = pricings.id', 'left') // Join dengan tabel pricings
            ->get()
            ->getResult();
    
        return view('booking_form', ['roomCategories' => $roomCategories]);
    }


}
