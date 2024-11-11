<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RoomFoodsModel;

class Food extends BaseController{

    protected $Food;

    function __construct(){

        $this->Food = new RoomFoodsModel();

    }

    public function index(){


        $data['roomfoods'] = $this->Food->findAll();

        return view('Foods/All-Food', $data);
    }

    public function create(){

        $data['roomfoods'] = $this->Food->findall();
        return view('Foods/Add-Food');

    }

    public function store(){
        $this->Food = new RoomFoodsModel();

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
        $this->Food->insert([
            'name' => $this->request->getVar('name'),

        ]);
        session()->setFlashdata('message', 'Room berhasil di tambahkan');
        return redirect()->to('Food');
    }

    function edit($id){

        $this->Food = new RoomFoodsModel();
        $data['roomfoods'] = $this->Food->find($id);

        return view('Foods/Edit-Food', $data);
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
        $data['roomfoods']  = $this->Food->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->Food->update($id,[
            'name' => $this->request->getVar('name'),
        ]);
        return redirect()->to('/Food');
    }

    public function delete($id){
        
        //$tblproduk = new TblprodukModel();
        $data['roomfoods']  =   $this->Food->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        $this->Food->delete($id);
        return redirect()->back()->with('Success', 'File/s Deleted successfully');
    }


}