<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RoomPricingsModel;
use App\Models\RoomCategoryModel;
use App\Models\RoomFoodsModel;
use App\Models\RoomCancelationChargeModel;

class Roompricings extends BaseController{

    protected $pricings;
    protected $roomcategory;
    protected $food;
    protected $cancelcategory;

    function __construct(){

        $this->pricings = new RoomPricingsModel();
        $this->roomcategory = new RoomCategoryModel();
        $this->food = new RoomFoodsModel();
        $this->cancelcategory = new RoomCancelationChargeModel();

    }

    public function index(){
        
        $data['pricings'] = $this->pricings->getRoomsWithCategories();
        return view('/Kamar/All-Kamar', $data);
    }


    public function create(){

        $data['roomfoods'] = $this->food->findAll();
        $data['roomcancelationcharges'] = $this->cancelcategory->findAll();
        $data['roomcategories'] = $this->roomcategory->findAll();
        return view('/kamar/add-kamar', $data);
    }

    public function store(){

        $this->pricings = new RoomPricingsModel();
        if(!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomcategory_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomfood_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomcancelationcharges_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'smoking' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'area' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'capacity' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded' => '{field} Harus diisi',
                    'is_image' => '{field} Harus berupa gambar',
                    'mime_in' => '{field} Harus berupa file gambar dengan format jpg, jpeg, gif, atau png'
                ]
            ],
            'gallery' => [
                'rules' => 'uploaded[gallery]|is_image[gallery]|mime_in[gallery,image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'uploaded' => '{field} Harus diisi',
                    'is_image' => '{field} Harus berupa gambar',
                    'mime_in' => '{field} Harus berupa file gambar dengan format jpg, jpeg, gif, atau png'
                ]
            ],
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $imageFile = $this->request->getFile('image');
        $galleryFiles = $this->request->getFileMultiple('gallery');

        // Generate unique names and move to 'uploads' folder
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getName();
            $imageFile->move('uploads', $imageName);
        } else {
            $imageName = null;
        }
        
        // Process gallery files
        $galleryNames = [];
        if ($galleryFiles) {
            foreach ($galleryFiles as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $galleryName = $file->getName();
                    $file->move('uploads/gallery', $galleryName);
                    $galleryNames[] = $galleryName; // Collect each file name
                }
            }
        }
        $galleryJson = !empty($galleryNames) ? json_encode($galleryNames) : null;
        
        $this->pricings->insert([
            'name' => $this->request->getVar('name'),
            'roomcategory_id' => $this->request->getVar('roomcategory_id'),
            'roomfood_id' => $this->request->getVar('roomfood_id'),
            'roomcancelationcharges_id' => $this->request->getVar('roomcancelationcharges_id'),
            'smoking' => $this->request->getVar('smoking'),
            'price' => $this->request->getVar('price'),
            'area' => $this->request->getVar('area'),
            'capacity' => $this->request->getVar('capacity'),
            'image' => $imageName, // save image name
            'gallery' => $galleryJson, // save gallery image name
        ]);
        session()->setFlashdata('message', 'Room berhasil di tambahkan');
        return redirect()->to('/roompricings');
    }

    function edit($id){
        
        $data['pricings'] =$this->pricings->find($id);

        $data['roomfoods'] =$this->food->findAll();
        $data['roomcancelationcharges'] =$this->cancelcategory->findAll();
        $data['roomcategories'] =$this->roomcategory->findAll();

        return view('kamar/edit-kamar', $data);

    }

    function update($id){

        $this->pricings = new RoomPricingsModel();

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomcategory_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomfood_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'roomcancelationcharges_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'smoking' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'area' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'capacity' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $imageFile = $this->request->getFile('image');
        $galleryFiles = $this->request->getFileMultiple('gallery');

        // Process main image
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getName();
            $imageFile->move('uploads', $imageName);
        } else {
            // Keep existing image if a new one is not uploaded
            $imageName = $this->pricings->find($id)->image;
        }

        // Process gallery files
        $galleryNames = [];
        if ($galleryFiles) {
            foreach ($galleryFiles as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $galleryName = $file->getName();
                    $file->move('uploads/gallery', $galleryName);
                    $galleryNames[] = $galleryName; // Collect each file name
                }
            }
        }

        // Keep existing gallery images if no new ones are uploaded
        if (empty($galleryNames)) {
            $galleryNames = json_decode($this->pricings->find($id)->gallery);
        }
        $galleryJson = !empty($galleryNames) ? json_encode($galleryNames) : null;

        $this->pricings->update($id, [
            'name' => $this->request->getVar('name'),
            'roomcategory_id' => $this->request->getVar('roomcategory_id'),
            'roomfood_id' => $this->request->getVar('roomfood_id'),
            'roomcancelationcharges_id' => $this->request->getVar('roomcancelationcharges_id'),
            'smoking' => $this->request->getVar('smoking'),
            'price' => $this->request->getVar('price'),
            'area' => $this->request->getVar('area'),
            'capacity' => $this->request->getVar('capacity'),
            'image' => $imageName, // save image name
            'gallery' => $galleryJson, // save gallery image names
        ]);

        session()->setFlashdata('message', 'Room berhasil diupdate');
        return redirect()->to('/roompricings');
    }
    public function delete($id){
        
        //$tblproduk = new TblprodukModel();
        $data['pricings']  =   $this->pricings->find($id);
        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }
        $this->pricings->delete($id);
        return redirect()->back()->with('Success', 'File/s Deleted successfully');
    }

    Public function view($id){

        $data['pricings'] =$this->pricings->find($id);


        $data['roomfoods'] =$this->food->findAll();
        $data['roomcancelationcharges'] =$this->cancelcategory->findAll();
        $data['roomcategories'] =$this->roomcategory->findAll();

        return view('Kamar/View-Kamar', $data);
    }



}