<?php namespace App\Controllers;

use App\Models\EmoticonstoreModel;

class Emoticonstore extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }

	public function index()
	{

        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
		
        echo view('templates/header', $data);
        echo view('emoticon-store', $data);
        echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
