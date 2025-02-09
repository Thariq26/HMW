<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'roomname_id',
        'total_members',
        'date',
        'time',
        'arival_date',
        'departure_date',
        'status'
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


   //public function getAllBookings() {
   //    return $this->db->table('bookings t1')
   //    ->join('roomcategories t2', 't2.id = t1.roomcategory_id')
   //    ->join('customers t3', 't3.id = t1.customer_id')
   //    ->get()
   //    ->getResultArray();
   //    // return $this->findAll();
   // }

   public function getRoomsWithCategories() {
    return $this->db->table('bookings')
        ->select('bookings.*, pricings.name AS pricing_name') // Memilih kolom yang diinginkan
        ->join('pricings', 'bookings.roomname_id = pricings.id', 'left') // Join dengan tabel pricings
        ->get() // Ambil hasil
        ->getResult(); // Ambil hasil sebagai array objek
}


}
