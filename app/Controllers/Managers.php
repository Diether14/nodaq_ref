<?php 

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfilephotoModel;
use App\Models\CommunityModel;
use App\Models\CommunityphotoModel;
use App\Models\UserscommunityModel;
use App\Models\UserspostModel;
use App\Models\UsersreportModel;
use App\Models\UserssharedpostModel;
use App\Models\UsersvoteModel;
use App\Models\CommunityassistantmanagersModel;
use App\Models\PostcommentsModel;
use App\Models\SharedcommentsModel;
use App\Models\JoincommunityfilesModel;

class Managers extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }

    public function dashboard($id = null){
 
        $data = [];
        helper(['form']);
        
        echo view('templates/header', $data);
        echo view('manager-community/manage-community-dashboard', $data);
        echo view('templates/footer', $data);
    }
}