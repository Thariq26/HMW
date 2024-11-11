<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RuanganModel;
use App\Models\RoomPricingsModel;

class Dashboard extends BaseController{
    
    protected $ruangan;
    protected $pricings;

    function __construct(){

        $this->ruangan = new RuanganModel();
        $this->pricings = new RoomPricingsModel();
    }   


    public function index(){ 

        $totalRoomsavailable = $this->ruangan->getTotalRooms('Available');
        $totalRoomunavailable = $this->ruangan->getTotalRooms('Unavailable');
        $totalpricings = $this->pricings->getTotalRooms();

        return view('/dashboard/dashboard',[
            'totalRoomsavailable'=>$totalRoomsavailable,
            'totalRoomunavailable'=>$totalRoomunavailable,
            'totalpricings'=>$totalpricings
        
        ]);
    }
}
