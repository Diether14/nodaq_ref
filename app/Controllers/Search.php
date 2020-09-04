<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
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

class Search extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }
    
	public function all()
	{
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');
        $q = $_GET['q'];
        
        $data['q'] = $q;

        $model = new UserspostModel();
          
        $data['blog'] = $model->where('user_id',  session()->get('id'))
        ->findAll();

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

            
        $db      = \Config\Database::connect();
        $builder = $db->table('community');
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name, users.nickname');
        $builder->like('community.title', $q);
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('users', 'community.user_id = users.id');
        

        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->like('users_post.title', $q);
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users.nickname, profile_photo.name' );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        
        $query1  = $builder1->get();
        $data['posts'] = $query1->getResult();  
        
        // echo '<pre>';
        // var_dump($data['posts']);exit;


        echo view('templates/header');
        echo view('search', $data);
        echo view('templates/footer');

    }

}