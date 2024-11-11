<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RoomPricingsModel;
use App\Models\RuanganModel;
use App\Models\RoomCategoryModel;
use App\Models\RoomFoodsModel;
use App\Models\RoomCancelationChargeModel;

class room extends Controller{

    protected $ruangan;
    protected $pricings;
    protected $roomcategory;
    protected $food;
    protected $cancelcategory;

    function __construct(){

        $this->ruangan = new RuanganModel();
        $this->pricings = new RoomPricingsModel();
        $this->roomcategory = new RoomCategoryModel();
        $this->food = new RoomFoodsModel();
        $this->cancelcategory = new RoomCancelationChargeModel();

    }


    public function index(){

        $data['pricings'] = $this->pricings->getRoomsWithCategories();
        $data['roomcategories'] =$this->roomcategory->findAll();
        $data['rooms'] = $this->ruangan->findAll();
        return view('Main-view/room', $data);
    }

    Public function view($id){

        $data['pricings'] =$this->pricings->find($id);

        $data['rooms'] =$this->ruangan->findAll();
        $data['roomfoods'] =$this->food->findAll();
        $data['roomcancelationcharges'] =$this->cancelcategory->findAll();
        $data['roomcategories'] =$this->roomcategory->findAll();

        return view('Bookings/All-Bookings', $data);
    }
}
