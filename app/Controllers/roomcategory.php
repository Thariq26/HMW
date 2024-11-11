<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RuanganModel;
use App\Models\RoomCategoryModel;

class Roomcategory extends BaseController{

    protected $roomcategory;

    function __construct(){

        $this->roomcategory = new RoomCategoryModel();

    }

    public function index(){


        $data['roomcategories'] = $this->roomcategory->findAll();

        return view('/Category/All-Category', $data);
    }

    public function create(){

        $data['roomcategories'] = $this->roomcategory->findall();
        return view('Category/Add-Category');

    }

    public function store(){
        $this->roomcategory = new RoomCategoryModel();

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
        $this->roomcategory->insert([
            'name' => $this->request->getVar('name'),

        ]);
        session()->setFlashdata('message', 'Room berhasil di tambahkan');
        return redirect()->to('/roomcategory');
    }

    function edit($id){

        $this->roomcategory = new RoomCategoryModel();
        $data['roomcategories'] = $this->roomcategory->find($id);

        return view('/Category/Edit-Category', $data);
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
        $data['roomcategories']  = $this->roomcategory->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $this->roomcategory->update($id,[
            'name' => $this->request->getVar('name'),
        ]);
        return redirect()->to('/roomcategory');
    }

    public function delete($id){
        
        //$tblproduk = new TblprodukModel();
        $data['roomcategories']  =   $this->roomcategory->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        $this->roomcategory->delete($id);
        return redirect()->back()->with('Success', 'File/s Deleted successfully');
    }


}