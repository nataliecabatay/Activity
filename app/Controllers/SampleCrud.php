<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\SongModel;
use App\Models\PlayListModel;

class SampleCrud extends Controller{
    public function index(){
        $songModel = new SongModel();
        $playListModel = new PlayListModel();
        $data['songs'] = $songModel->orderBy('Id','DESC')->findAll();
        $data['playlist'] = $playListModel->orderBy('Id','DESC')->findAll();
        return view('Songs',$data);
    }
    public function indexs(){
        $productModel = new ProductModel();
        $data['products'] = $productModel->orderBy('id','DESC')->findAll();
        return view('ProductList',$data);
    }

    public function OnPostUploadMusic(){
        $songModel = new SongModel();

        $file = $this->request->getFile('song-name');
        
        $imageName = $file->getRandomName();
        $file->move('uploads/',$imageName);

        $data = [
            'SongName'=> $imageName,
            'PlayListId'=>$this->request->getVar('playlist')
        ];
        $songModel->insert($data);
        return $this->response->redirect(site_url('/'));
    }

    public function OnPostCreatePlaylist(){
        $playListModel = new PlayListModel();

        $data = [

            'PlayListName'=>$this->request->getVar('playlist-name'),
        ];

        $playListModel->insert($data);
        return $this->response->redirect(site_url('/'));
    }

    public function OnGetPlayList($id = null){
        $songModel = new SongModel();
        $playListModel = new PlayListModel();
        $data['songs'] = $songModel->where('PlayListId', $id)->findAll();
        $data['playlist'] = $playListModel->where('Id',$id)->first();
        return view('PlayList',$data);
    }

    public function OnGetDeletePlayList($id=null){
        $songModel = new SongModel();
       $songModel->where('Id',$id)->delete($id);
        return $this->response->redirect(site_url('/'));

    }

    public function OnDeletePlayL(){
        $playListModel = new PlayListModel();
        $id = $this->request->getVar('p-id');
        $playListModel->where('Id',$id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }
    /*
    public function OnPost(){
        $productModel = new ProductModel();
        $data =[
            'ProductName'=>$this->request->getVar('p-name'),
            'ProductDescription'=>$this->request->getVar('p-description'),
            'ProductCategory'=> $this->request->getVar('p-category'),
            'ProductQuantity'=>$this->request->getVar('p-quantity'),
            'ProductPrice'=>$this->request->getVar('p-price')
        ];
        $productModel->insert($data);
        return $this->response->redirect(site_url('/'));
    }

    public function OnUpdate(){
        $productModel = new ProductModel();
        $id = $this->request->getVar('p-id');
        $data =[
            'ProductName'=>$this->request->getVar('p-name'),
            'ProductDescription'=>$this->request->getVar('p-description'),
            'ProductCategory'=> $this->request->getVar('p-category'),
            'ProductQuantity'=>$this->request->getVar('p-quantity'),
            'ProductPrice'=>$this->request->getVar('p-price')
        ];
        $productModel->update($id,$data);
        return $this->response->redirect(site_url('/'));
    }

    public function OnDelete($id = null){
        $productModel = new ProductModel();
        $data['products'] = $productModel->where('Id',$id)->delete($id);
        return $this->response->redirect(site_url('/'));
    }*/
}


?>