<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RuanganModel;
use App\Models\RoomPricingsModel;
use App\Models\RoomCategoryModel;
use App\Models\RoomFoodsModel;
use App\Models\RoomCancelationChargeModel;

class Ruangan extends BaseController{

    protected $ruangan;
    protected $food;
    protected $pricings;
    protected $cancelcategory;
    protected $roomcategories;

    function __construct(){
        $this->ruangan = new RuanganModel();
        $this->pricings = new RoomPricingsModel();
        $this->food = new RoomFoodsModel();
        $this->cancelcategory = new RoomCancelationChargeModel();
        $this->roomcategories = new RoomCategoryModel();

    }

    public function index(){

        $this->cachePage(0); // Disable caching for this page
        $data['rooms'] = $this->ruangan->getRoomsWithCategories();
        return view('Ruangan/All-ruangan', $data);
    }

    public function create(){

        $data['pricings'] = $this->pricings->findAll();
        $data['roomfoods'] = $this->food->findAll();
        $data['roomcancelationcharges'] = $this->cancelcategory->findAll();
        return view('ruangan/Add-ruangan', $data);
    }

    public function store(){
        $this->ruangan = new RuanganModel();
        if(!$this->validate([
            'number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomname_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->ruangan->insert([
            'number' => $this->request->getVar('number'),
            'roomname_id' => $this->request->getVar('roomname_id'),
            'status' => $this->request->getVar('status'),
        ]);
        session()->setFlashdata('message', 'Room berhasil di tambahkan');
        return redirect()->to('/Ruangan');
    }

    function edit($id){

        $data['rooms'] = $this->ruangan->find($id);  // Ensure this returns an object or array

        if (!$data['rooms']) {  // Check if room is found
            session()->setFlashdata('error', 'Room tidak ditemukan');
            return redirect()->to('/room');
        }
    
        $data['pricings'] = $this->pricings->findAll();
        $data['roomfoods'] = $this->food->findAll();
        $data['roomcancelationcharges'] = $this->cancelcategory->findAll();
        return view('ruangan/Edit-ruangan', $data);
    }

    public function update($id){

        if(!$this->validate([
            'number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomname_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $data['rooms']  = $this->ruangan->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->ruangan->update($id,[
            'number' => $this->request->getVar('number'),
            'roomname_id' => $this->request->getVar('roomname_id'),
            'status' => $this->request->getVar('status'),
        ]);
        return redirect()->to('/ruangan');
    }

    public function delete($id) {
        
        $data['rooms'] = $this->ruangan->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        $this->ruangan->delete($id);
        return redirect()->back()->with('sucess','File/s Deteled Sucessfully');
    }

    public function change_status($id, $status)
{
    // Cek apakah ruangan ada
    $room = $this->ruangan->find($id);

    if (empty($room)) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
    }

    // Tentukan status baru berdasarkan status yang diberikan
    if ($status === 'Available') {
        $newStatus = 'Available'; // Set status ke 'Available'
    } elseif ($status === 'Unavailable') {
        $newStatus = 'Unavailable'; // Set status ke 'Unavailable'
    } else {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Status tidak valid');
    }

    // Update status di database
    $this->ruangan->update($id, ['status' => $newStatus]);

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Status ruangan berhasil diubah menjadi ' . $newStatus);
}

    
}

