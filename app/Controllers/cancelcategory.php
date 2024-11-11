<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RoomCancelationChargeModel;

class CancelCategory extends BaseController{

    protected $cancelcategory;

    function __construct(){

        $this->cancelcategory = new RoomCancelationChargeModel();

    }

    public function index(){


        $data['roomcancelationcharges'] = $this->cancelcategory->findAll();

        return view('Cancelations/All-Cancelation', $data);
    }

    public function create(){

        $data['roomcancelationcharges'] = $this->cancelcategory->findall();
        return view('Cancelations/Add-Cancelation');

    }

    public function store(){
        $this->cancelcategory = new RoomCancelationChargeModel();

        if(!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->cancelcategory->insert([
            'name' => $this->request->getVar('name'),

        ]);
        session()->setFlashdata('message', 'Room berhasil di tambahkan');
        return redirect()->to('/cancelcategory');
    }

    function edit($id){

        $this->cancelcategory = new RoomCancelationChargeModel();
        $data['roomcancelationcharges'] = $this->cancelcategory->find($id);

        return view('/Cancelations/Edit-Cancelation', $data);
    }

    public function update($id){

        if(!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $data['roomcancelationcharges']  = $this->cancelcategory->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->cancelcategory->update($id,[
            'name' => $this->request->getVar('name'),
        ]);
        return redirect()->to('/cancelcategory');
    }

    public function delete($id){
        
        //$tblproduk = new TblprodukModel();
        $data['roomcancelationcharges']  =   $this->cancelcategory->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        $this->cancelcategory->delete($id);
        return redirect()->back()->with('Success', 'File/s Deleted successfully');
    }


}