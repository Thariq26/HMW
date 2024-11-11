<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BookingsModel;
use App\Models\RoomPricingsModel;
use App\Models\RuanganModel;

class Bookings extends BaseController{

    protected $bookings;
    protected $pricings;
    protected $ruangan;

    function __Construct(){

        $this->bookings = new BookingsModel();
        $this->pricings = new RoomPricingsModel();
        $this->ruangan = new RuanganModel();
    }

    public function index(){

        $data['bookings'] = $this->bookings->getRoomsWithCategories();
        $data['pricings'] = $this->pricings->findAll();
        $data['rooms'] = $this->ruangan->findAll();

        return view('bookings/All-bookings', $data);
    }

    public function create(){

        $data['pricings'] = $this->pricings->findAll();
        $data['rooms'] = $this->ruangan->findAll();

        return view('bookings/All-bookings');
    }
    

}