<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomFoodsModel extends Model
{
    protected $table = 'roomfoods';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'name',
        'description'
    ]; // Adjust according to your table fields




}
