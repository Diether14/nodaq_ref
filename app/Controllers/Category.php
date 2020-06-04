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
        $data['community_id'] = $id;

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
        $builder2->select('users_post.id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.description, users_post.updated_at, users.nickname,profile_photo.name');
        $builder2->where('users_shared_posts.community_id', $id );
        
        $builder2->join('users', 'users.id = users_shared_posts.user_id');
        $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        $builder2->join('profile_photo', 'users.id = profile_photo.user_id');

        $query2  = $builder2->get();
        $data['shared'] = $query2->getResult();  

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

    public function add_upvote(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form', 'url']);

        $post_id = $this->request->getPost('post_id');
        $community_id = $this->request->getPost('community_id');
        $user_id = session()->get('id');
        $status = "1";

        $model =  new UsersvoteModel();
        
        $user_vote = $model->where('user_id', $user_id)->where('community_id', $community_id)->where('post_id', $post_id)->first();
     

        if($user_vote == NULL){
            
        $data = [
            'user_id' => $user_id,
            'post_id' => $post_id,
            'community_id' => $community_id,
            'status' => '1'
        ];

        $insert = $model->insert($data);

            if($insert){
                $msg = 'Upvoted';
                return redirect()->to( base_url(). '/post-view/'. $post_id)->with('vote', $msg);
            }else{
                $msg = 'Failed to Upvote';
                return redirect()->to( base_url(). '/post-view/'. $post_id)->with('vote', $msg);
            }
        
        }else{
                
            $data = [
                'user_id' => $user_id,
                'post_id' => $post_id,
                'community_id' => $community_id,
                'status' => '1'
            ];

            $update = $model->update($user_vote['id'], $data);

            $msg = 'Upvoted';
            return redirect()->to( base_url(). '/post-view/'. $post_id)->with('vote', $msg);

        }
    }

    public function add_devote(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form', 'url']);


        $post_id = $this->request->getPost('post_id');
        $community_id = $this->request->getPost('community_id');
        $user_id = session()->get('id');
        $status = "0";
        

        $data = [
            'user_id' => $user_id,
            'post_id' => $post_id,
            'community_id' => $community_id,
            'status' => '0'
        ];

        $model =  new UsersvoteModel();
        
        $user_vote = $model->where('user_id', $user_id)->where('community_id', $community_id)->where('post_id', $post_id)->first();


        if($user_vote == NULL){
            $insert = $model->insert($data);

            if($insert){
                $msg = 'Devoted';
                return redirect()->to( base_url(). '/post-view/'. $post_id)->with('vote', $msg);
            }else{
                $msg = 'Failed to Upvote';
                return redirect()->to( base_url(). '/post-view/'. $post_id)->with('vote', $msg);
            }
        
        }else{

            $data = [
                'user_id' => $user_id,
                'post_id' => $post_id,
                'community_id' => $community_id,
                'status' => '0'
            ];

            $update = $model->update($user_vote['id'], $data);

            $msg = 'Devoted';
            return redirect()->to( base_url(). '/post-view/'. $post_id)->with('vote', $msg);

        }

    }

    public function community(){
        // echo 'test';exit;
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        $model = new UserspostModel();
          
        $data['blog'] = $model->where('user_id',  session()->get('id'))
        ->findAll();

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name, users.nickname');
        $builder->where('community.user_id', session()->get('id'));
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('users', 'community.user_id = users.id');
        

        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        echo view('templates/header', $data);
        echo view('community', $data);
        echo view('templates/footer', $data); 
    }

    public function save_community(){
            ini_set('display_errors', 1);
    
    
    
            helper(['form', 'url']);
    
    
            $community_photo = new CommunityphotoModel();
     
             $validated = $this->validate([
                'file' => [
                    'uploaded[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[file,4096]',
                ],
            ]);
    
            $rules = [
                'title' => 'required|min_length[3]|max_length[20]',
                'content' => 'required|min_length[3]|max_length[500]',
                'upvote' => 'required|min_length[3]|max_length[12]',
                'devote' => 'required|min_length[3]|max_length[12]',   
            ];
    
            $msg = 'Please select a valid file';
        if(! $this->validate($rules)){
            $msg = $this->validator;
        }else{
            if ($validated ) {
                $avatar = $this->request->getFile('file');
                $avatar->move('public/admin/uploads/community');
     
                $data = [
                    'name' =>  $avatar->getClientName(),
                    'type'  => $avatar->getClientMimeType()
                ];
            
                if($community_photo->insert($data)){
                    
                    $model = new CommunityModel;
    
                    $last_id = $community_photo->insertID();
                    if($this->request->getPost('community_type') == "on"){
                        $community_type = '1';
                    }else{
                        $community_type = '0';
                    }
            
                    
              
                    $newData = [
                        'com_photo_id' => $last_id,
                        'user_id' => session()->get('id'),
                        'title' => $this->request->getPost('title'),
                        'content' => $this->request->getPost('content'),
                        'community_type' => $community_type,
                        'color' => $this->request->getPost('color'),
                        'text_color' => $this->request->getPost('text_color'),
                        'upvote_name' => $this->request->getPost('upvote'),
                        'devote_name' => $this->request->getPost('devote')
                        ];
                    
                    if($model->insert($newData)){
                        $last_id = $model->insertID();
    
                        $msg = 'Successfully added!';   
                    }
                }else{
                    $msg = 'There is an error!';
                }
    
                
            }
    
        }
    
           
    
    
            return redirect()->to( 'community')->with('msg', $msg);
     
        }
    
}


?>