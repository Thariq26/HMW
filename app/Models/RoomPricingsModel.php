<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomPricingsModel extends Model{

    protected $DBGroup = 'default';
    protected $table = 'pricings';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'name',
        'roomcategory_id',
        'roomfood_id',
        'roomcancelationcharges_id',
        'smoking',
        'price',
        'area',
        'capacity',
        'image',
        'gallery',
        
    ]; // Adjust according to your table fields

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
        return $this->db->table('pricings')
        ->select('pricings.*, roomcategories.name AS category_name, roomfoods.name AS food_name, roomcancelationcharges.name AS cancelcategory') // Select desired fields
        ->join('roomcategories', 'pricings.roomcategory_id = roomcategories.id', 'left')
        ->join('roomfoods', 'pricings.roomfood_id = roomfoods.id', 'left')
        ->join('roomcancelationcharges', 'pricings.roomcancelationcharges_id = roomcancelationcharges.id', 'left')
        ->get()
        ->getResult();

    }

    public function getTotalRooms()
    {
        return $this->countAll('pricings');
    }
    

}
