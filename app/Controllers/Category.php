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


class Category extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }
    
    public function index()
    {
        // ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        
        echo view('templates/header', $data);
        echo view('users/category', $data);
        echo view('templates/footer', $data);
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

    public function cafeStyleView(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('cafe-style-view', $data);
        echo view('templates/footer', $data);
    }

    public function blogStyle(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('blog-style', $data);
        echo view('templates/footer', $data);
    }

    public function cartoonStyle(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('cartoon-style', $data);
        echo view('templates/footer', $data); 
    }

    public function meetingStyle(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('meeting-style', $data);
        echo view('templates/footer', $data); 
    }

    public function settingsGallery(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('settings-gallery', $data);
        echo view('templates/footer', $data); 
    }

    public function settingsGallery1(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('settings-gallery1', $data);
        echo view('templates/footer', $data); 
    }

    public function community_join($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color, community_photo.name');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        
        $model = new UserscommunityModel;

        $data['users_community'] = $model->where(['user_id' => session()->get('id'), 'community_id' => $id])->first();


        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->where('users_post.community_id', $id);
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.description, users_post.updated_at, users.nickname, profile_photo.name' );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        
        $query1  = $builder1->get();
        $data['posts'] = $query1->getResult();  
    
        $db2      = \Config\Database::connect();
        $builder2 = $db2->table('users_shared_posts');
        $builder2->select('users_shared_posts.id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.description, users_post.updated_at, users.nickname,profile_photo.name');
        $builder2->join('users', 'users.id = users_shared_posts.user_id');
        $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        $builder2->join('profile_photo', 'users.id = profile_photo.user_id');

        $query2  = $builder2->get();
        $data['shared'] = $query2->getResult();  

        // echo '<pre>';
        // var_dump($data['shared']);exit;


        echo view('templates/header', $data);
        echo view('community-join', $data);
        echo view('templates/footer', $data); 
    }

    public function join_community(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);

        $model = new UserscommunityModel;

        $community_id = $this->request->getPost('community_id');

        $data = [
            'user_id' => session()->get('id'),
            'community_id' => $community_id
        ];

        if($model->save($data)){
            $msg = 'You has been joined the community';
        }else{
            $msg = 'There is an error';
        }

        
        
        return redirect()->to( base_url().'/community-join/'.$community_id)->with('msg', $msg);
    }

    public function report_post(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);

        $model = new UsersreportModel;

        $community_id = $this->request->getPost('community_id');
        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $this->request->getPost('post_id'),
            'community_id' => $community_id,
            'report_content' => $this->request->getPost('report_content')
        ];

        if($model->insert($data)){
            $msg = 'Reported!';
            return redirect()->to( base_url().'/post-view/'.$community_id)->with('msg', $msg);
        }

    }

    public function share_post(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);

        $model = new UserssharedpostModel;

        $community_id = $this->request->getPost('community_id');
        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $this->request->getPost('post_id'),
            'community_id' => $community_id,
            'content' => $this->request->getPost('share_content')
        ];

        if($model->insert($data)){
            $msg = 'Reported!';
            return redirect()->to( base_url().'/post-view/'.$community_id)->with('msg', $msg);
        }

    }
    
    public function delete_shared_post($id = null){

        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
       
        $model = new UserssharedpostModel();

        $query = $model->where('id', $id)->delete();

        if($query){
            $msg = 'Post Deleted!';
            return redirect()->to( base_url().'/profile')->with('msg', $msg);
        }
    }

    public function delete_post($id = null){

        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
       
        $model = new UserspostModel();

        $query = $model->where('id', $id)->delete();

        if($query){
            $msg = 'Post Deleted!';
            return redirect()->to( base_url().'/profile')->with('msg', $msg);
        }
    }
}


?>