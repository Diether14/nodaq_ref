<?php 

namespace App\Controllers;

use App\Models\UserModel;

class Category extends BaseController
{
    public function index()
    {
        // ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        echo 'test';
        // echo view('templates/header', $data);
        // echo view('dashboard', $data);
        // echo view('templates/footer', $data);
    }

    public function categoryCreate()
    {
        // ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('category-create', $data);
        echo view('templates/footer', $data);
    }


    public function cafeStyle(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('cafe-style', $data);
        echo view('templates/footer', $data);
    }

}


?>