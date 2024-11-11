<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomCategoryModel extends Model
{
    protected $table = 'roomcategories';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'name', 
        'description'
    ]; // Adjust according to your table fields

}
