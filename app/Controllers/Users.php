<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\UseripModel;
use App\Models\ProfilephotoModel;
use App\Models\CoverphotoModel;
use App\Models\UsersettingsModel;
use App\Models\UserspostModel;
use App\Models\PostcommentsModel;
use App\Models\UsersreportModel;
use App\Models\CommunityModel;
use App\Models\UserscommunityModel;
use App\Models\UserssharedpostModel;
use App\Models\SharedcommentsModel;
use App\Models\UsersvoteModel;


class Users extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }
    
	public function index()
	{
        ini_set('display_errors', 1);
        // get_ip_address();
        

        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('login', $data);
        // echo view('templates/footer', $data);

    }

    public function login(){
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
    
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'Email or Password don\'t match'
            ]
        ];
        
        if (! $this->validate($rules, $errors)) {
            $data['validation'] = $this->validator;

            
        }else{
            $model = new UserModel();

            $user = $model->where('email', $this->request->getVar('email'))
                          ->first();
            
            
            $ip_model = new UseripModel();
          
            $user_ip = $ip_model->select(['ip'])->where('user_id',  $user['id'])
            ->findAll();

            if(count($user_ip) <= '10'){
    
                $users_ip = flatten($user_ip);

                if( get_ip_address() != in_array(get_ip_address(), $users_ip, TRUE)){
                    $data = [
                        'user_id' => $user['id'],
                        'ip'  => get_ip_address(),
                        ];
            
                        $save =$ip_model->insert($data);
                }
                $session = session();
                $this->setUserSession($user);
                if($user['user_type'] == '3' || $user['user_type'] == '1' || $user['user_type'] == '2'){
                    return redirect()->to('admin');
                }elseif($user['user_type'] == '0'){
                    $session->setFlashdata('success', 'Login Successfully!');
                    return redirect()->to(base_url().'/home');
                }else{
                    $session->setFlashdata('success', 'Invalid Username or Password!');
                    return redirect()->to(base_url());
                }

                
            }else{
                return redirect()->to(base_url());
            }
            
        }
            }

        echo view('templates/header', $data);
        echo view('login', $data);
    }


    
    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'nickname' => $user['nickname'],
            'email' => $user['email'],
            'user_type' => $user['user_type'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }


    public function register(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'birthdate' => 'required',
                'gender' => 'required',
                'nickname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                
                $model = new UserModel();

                $newData = [
                    'birthdate' => $this->request->getVar('birthdate'),
                    'gender' => $this->request->getVar('gender'),
                    'nickname' => $this->request->getVar('nickname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password')
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to(base_url());
            
            }
        }


        echo view('templates/header', $data);
        echo view('register', $data);
        // echo view('templates/footer', $data);
    }

	public function settings()
	{
        ini_set('display_errors', 1);
        // get_ip_address();
        
        $data = [];
        helper(['form']);
        $model = new UserModel();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nickname' => 'required|min_length[3]|max_length[20]',
            ];
            
            if($this->request->getPost('password') != ''){
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
                
            }

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{

                $newData = [
                    'id' => session()->get('id'),
                    'nickname' => $this->request->getPost('nickname'),
                ];

                if($this->request->getPost('password') != ''){
                    $newData['password'] = $this->request->getPost('password');
                }

                $model->save($newData);
                // $session = session();
                session()->setFlashdata('success', 'Successful Updated');
                return redirect()->to(base_url().'/settings');
            
            }
        }

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

        $user_settings = new UsersettingsModel();

        $data['user_settings'] = $user_settings->where('user_id', session()->get('id'))
            ->first();

        echo view('templates/header', $data);
        echo view('settings', $data);
        echo view('templates/footer', $data);

    }
    public function profile(){
        ini_set('display_errors', 1);


        $data = [];
        helper(['form']);
        helper('text');
        $model = new UserModel();

        $profile_photo = new ProfilephotoModel();
        $cover_photo = new CoverphotoModel();
        $users_setting = new UsersettingsModel();
        $users_post = new UserspostModel();


        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();
        $data['cover_photo'] = $cover_photo->where('user_id', session()->get('id'))
            ->first();
        
        $data['users_settings'] = $users_setting->where('user_id', session()->get('id'))
            ->first();

        $data['users_post'] = $users_post->where('user_id', session()->get('id'))
            ->findAll();
        $data['user'] = $model->where('id', session()->get('id'))->first();

        $posts = new UserspostModel();
        

        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->where('users_post.user_id', session()->get('id'));
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.content, users_post.updated_at, users.nickname, profile_photo.name, user_settings.user_mode' );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder1->join('user_settings', 'users.id = user_settings.user_id');
        $query1  = $builder1->get();
        $data['posts'] = $query1->getResult();  

        
        $db      = \Config\Database::connect();
        $builder = $db->table('community');
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color, community.text_color, community_photo.name, users.nickname');
        $builder->where('community.user_id', session()->get('id'));
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('users_community', 'users_community.community_id = community.id');
        $builder->join('users', 'users.id = users_community.user_id');
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();
  

        
        $db2      = \Config\Database::connect();
        $builder2 = $db2->table('users_shared_posts');
        $builder2->select('users_shared_posts.id, users_shared_posts.post_id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users.nickname,profile_photo.name, user_settings.user_mode');
        $builder2->where('users_shared_posts.user_id', session()->get('id'));
       
        $builder2->join('users', 'users.id = users_shared_posts.user_id');
        $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        $builder2->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder2->join('user_settings', 'users.id = user_settings.user_id');

        $query2  = $builder2->get();
        $data['shared'] = $query2->getResult();  

        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }

    public function view_profile($id = null){
        ini_set('display_errors', 1);


        $data = [];
        helper(['form']);
        helper('text');

        $profile_photo = new ProfilephotoModel();
        $cover_photo = new CoverphotoModel();
        $users_setting = new UsersettingsModel();
        $users_post = new UserspostModel();
        $model = new UserModel();

        $data['profile_photo'] = $profile_photo->where('user_id', $id)
            ->first();
        $data['cover_photo'] = $cover_photo->where('user_id', $id)
            ->first();
        $data['users_settings'] = $users_setting->where('user_id', $id)
            ->first();

        $data['user'] = $model->where('id', $id)->first();
        $posts = new UserspostModel();
        

        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->where('users_post.user_id', $id);
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.content, users_post.updated_at, users.nickname, profile_photo.name' );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        
        $query1  = $builder1->get();
        $data['posts'] = $query1->getResult();  

        
        $db      = \Config\Database::connect();
        $builder = $db->table('community');
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color, community.text_color, community_photo.name, users.nickname');
        $builder->where('community.user_id', $id);
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('users_community', 'users_community.community_id = community.id');
        $builder->join('users', 'users.id = users_community.user_id');
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();
  

        
        $db2      = \Config\Database::connect();
        $builder2 = $db2->table('users_shared_posts');
        $builder2->select('users_shared_posts.id, users_shared_posts.post_id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users.nickname,profile_photo.name');
        $builder2->where('users_shared_posts.user_id', $id);
       
        $builder2->join('users', 'users.id = users_shared_posts.user_id');
        $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        $builder2->join('profile_photo', 'users.id = profile_photo.user_id');

        $query2  = $builder2->get();
        $data['shared'] = $query2->getResult();  

        // echo '<pre>';
        // var_dump($data);exit;

        echo view('templates/header', $data);
        echo view('profile-view');
        echo view('templates/footer');
    }


    public function update_profile(){
        ini_set('display_errors', 1);


        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                // 'firstname' => 'required|min_length[3]|max_length[20]',
                // 'lastname' => 'required|min_length[3]|max_length[20]',
                'nickname' => 'required|min_length[3]|max_length[20]',
            ];
  
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{

                $newData = [
                    'id' => session()->get('id'),
                    // 'firstname' => $this->request->getPost('firstname'),
                    // 'lastname' => $this->request->getPost('lastname'),
                    'nickname' => $this->request->getPost('nickname'),
                ];

                $model->save($newData);
                // $session = session();
                session()->setFlashdata('success', 'Successful Updated');
                return redirect()->to(base_url().'/profile');
            
            }
        }        
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function post(){
        $data = [];
        helper(['form']);

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();
      
        echo view('templates/editor-header', $data);
        echo view('post', $data);
        echo view('templates/editor-footer', $data);
       
    }


    public function edit_post(){
     

        ini_set('display_errors', 1);
        helper(['form', 'url']);
        $model = new UserspostModel();
       
        $data = array(
            'id' => $this->request->getPost('id'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'description' => $this->request->getPost('description')
        );

        $update = $model->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function edit_shared_post(){

        ini_set('display_errors', 1);
        helper(['form', 'url']);
        $model = new UserssharedpostModel();
       
        $data = array(
            'id' => $this->request->getPost('id'),
            'content' => $this->request->getPost('content')
        );
      
        $update = $model->save($data);
        
        echo json_encode(array("status" => TRUE));
    }

    public function cafe(){
        $data = [];
        helper(['form']);

        echo view('templates/editor-header', $data);
        echo view('users/cafe', $data);
        echo view('templates/editor-footer', $data);

    }

    public function cartoonnovel(){
        $data = [];
        helper(['form']);

        echo view('templates/editor-header', $data);
        echo view('users/cartoonnovel', $data);
        echo view('templates/editor-footer', $data);
       
    }

    public function article(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('users/article', $data);
        echo view('templates/footer', $data);
       
    }

    public function article_publish(){
        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('users/article-publish', $data);
        echo view('templates/footer', $data);
    }

    public function form(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

    
        echo view("users/form");
        
    }

    public function change_profile()
    {  
        ini_set('display_errors', 1);

        helper(['form', 'url']);
         
     $db      = \Config\Database::connect();
         $builder = $db->table('profile_photo');
 
         $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);

        $msg = 'Please select a valid file';
  
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $avatar->move('public/user/uploads/profiles');
 
            $model = new UserModel();


          $data = [
            'user_id' => session()->get('id'),
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
          ];
          
          $profile_photo = new ProfilephotoModel();
  
          $profile_datas = $profile_photo->where('user_id', session()->get('id'))
              ->first();

          if(!empty($profile_datas)){
            $save = $builder->where('user_id', session()->get('id'))->update($data);
            $msg = 'File has been updated';

          }else{
            $save = $builder->insert($data);
            $msg = 'File has been uploaded';
          }

       
        }
 
       return redirect()->to( base_url('/profile') )->with('msg', $msg);
 
    }

    public function change_cover()
    {  
        ini_set('display_errors', 1);

        helper(['form', 'url']);
         
     $db      = \Config\Database::connect();
         $builder = $db->table('cover_photo');
 
        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid file';
  
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $avatar->move('public/user/uploads/covers');
 
            $model = new UserModel();


          $data = [
            'user_id' => session()->get('id'),
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
          ];
 
         
          $cover_photo = new CoverphotoModel();
  
          $cover_datas = $cover_photo->where('user_id', session()->get('id'))
              ->first();
          
              if(!empty($cover_datas)){
                $save = $builder->where('user_id', session()->get('id'))->update($data);
                $msg = 'File has been updated';
              }else{
                $save = $builder->insert($data);
                $msg = 'File has been uploaded';
              }

        }
 
       return redirect()->to( base_url('/profile') )->with('msg', $msg);
 
    }

    public function update_mode(){
        ini_set('display_errors', 1);

        helper(['form', 'url']);
        if($this->request->getPost('mode') == 'on'){
            $mode = '1';
        }else{
            $mode = '0';
        }
        
        if($this->request->getPost('nickname') == 'on'){
            $nickname = '1';
        }else{
            $nickname = '0';
        }
        
        $model = new UsersettingsModel();

        $data = [
            'user_id' => session()->get('id'),
            'user_mode' => $mode,
            'user_nickname' => $nickname
        ];
        
        $user_settings = $model->where('user_id', session()->get('id'))
        ->first();

        if($user_settings){
            if($model
            ->where('user_id', [session()->get('id')])
            ->set($data )
            ->update()){
                session()->setFlashdata('success_nickname', 'Successfully Updated');
            }
        }else{
            if($model->save($data)){
                 session()->setFlashdata('success_nickname', 'Successfully Updated');
            }
        }
     
         return redirect()->to( base_url('/settings') );
 
    }

    public function update_profile_info(){
        ini_set('display_errors', 1);

        helper(['form', 'url']);
        

        $rules = [
            'birthdate' => 'required',
            'gender' => 'required',
            'nickname' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
        ];
        
        if (! $this->validate($rules)) {
            $data['validation'] = $this->validator;
        }else{
            
            $model = new UserModel();

            $newData = [
                'birthdate' => $this->request->getVar('birthdate'),
                'gender' => $this->request->getVar('gender'),
                'nickname' => $this->request->getVar('nickname'),
                'email' => $this->request->getVar('email')
            ];



            if($model
            ->where('id', [session()->get('id')])
            ->set($newData)
            ->update()){
                $session = session();
                $session->setFlashdata('success', 'Update Successfully!');
            }else{
                $session = session();
                $session->setFlashdata('success', 'Update Failed!');
            }

           
            return redirect()->to(base_url().'/settings');
        
        }
    }

  
    public function post_view($id = NULL){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form', 'url']);

        $model = new UserspostModel();
        $user = new UserModel();
        $share = new UserssharedpostModel();
        $user_settings = new UsersettingsModel();

        $data['blog'] = $model->where('id', $id)->first();
        $data['shared'] = $share->where('post_id', $id)->where('community_id', $data['blog']['community_id'])->first();

        $data['users_community'] = $model->where('user_id', session()->get('id'))->where('community_id', $data['blog']['community_id'])->first();

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo1'] = $profile_photo->where('user_id',$data['blog']['user_id'])
            ->first();
        
        $data['user'] = $user->where('id',$data['blog']['user_id'])
            ->first();
                    
        $data['user_settings'] = $user_settings->where('user_id',$data['blog']['user_id'])
            ->first();

        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();   
        
        
 


        $db = \Config\Database::connect();
        $builder = $db->table('post_comments');
        $builder->where('post_comments.post_id', $id);
        $builder->select('post_comments.id, post_comments.user_id, post_comments.post_id, post_comments.content, post_comments.updated_at, users.nickname, profile_photo.name, user_settings.user_mode');
        $builder->join('users', 'users.id = post_comments.user_id');
        $builder->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder->join('user_settings', 'users.id = user_settings.user_id' );
        $query = $builder->get();
        $data['post_comments'] = $query->getResult();

        $report = new UsersreportModel();

        $data['report'] = $report->where(['user_id' => session()->get('id'),  'post_id' => $id])->first();

        $db1 = \Config\Database::connect();
        $builder1 = $db1->table('community');
        $builder1->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.updated_at, community_photo.name');
        $builder1->where('users_community.user_id', session()->get('id'));
        $builder1->join('users_community', 'users_community.community_id = community.id');
        $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
        $query1 = $builder1->get();
        $data['community'] = $query1->getResult();
        // echo '<pre>';
        // var_dump( session()->get('id'));exit;

        $db2 = \Config\Database::connect();
        $builder2 = $db1->table('community');
        $builder2->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.updated_at, community_photo.name');
        $builder2->where('community.id', $data['blog']['community_id']);
        $builder2->join('community_photo', 'community_photo.id = community.com_photo_id');
        $query2 = $builder2->get();
        $data['community_current'] = $query2->getResult();
   
        $com = new CommunityModel();
        $data['com'] = $com->where('id', $data['blog']['community_id'])->first();
        // var_dump($data['com']);exit;
        $voteModel = new UsersvoteModel(); 

        $data['vote'] = $voteModel->where('user_id', session()->get('id'))->where('post_id', $id)->where('community_id', $data['blog']['community_id'])->first();
        // var_dump($data[''])


        $data['vote_totals'] = $voteModel->where('post_id', $id)->where('community_id', $data['blog']['community_id'])->where('status', '1')->countAllResults();

        echo view('templates/header', $data);
        echo view('post-view', $data);
        echo view('templates/footer', $data);
    }

    public function post_share($id = NULL, $community_id = NULL){
        ini_set('display_errors', 1);


        $data = [];
        helper(['form', 'url']);
        // $db      = \Config\Database::connect();
        // $builder = $db->table('profile_photo');
        // $query   = $builder->get(); 

        // test($query);

        $model = new UserspostModel();
        $user = new UserModel();
        $share = new UserssharedpostModel();
    

        $data['blog'] = $model->where('id', $id)->first();
        $data['shared'] = $share->where('post_id', $id)->where('community_id', $community_id)->first();



        $profile_photo = new ProfilephotoModel();
        $data['profile_photo1'] = $profile_photo->where('user_id', $data['blog']['user_id'])
            ->first();


        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
                ->first();

        $data['user'] = $user->where('id',$data['blog']['user_id'])
            ->first();

        $data['current_user'] = $user->where('id', session()->get('id'))
            ->first();
        
        $db = \Config\Database::connect();
        $builder = $db->table('shared_comments');
        $builder->where('shared_comments.post_id', $id);
        $builder->select('shared_comments.id, shared_comments.user_id, shared_comments.post_id, shared_comments.content, shared_comments.updated_at, users.nickname, profile_photo.name');
        $builder->join('users', 'users.id = shared_comments.user_id');
        $builder->join('profile_photo', 'users.id = profile_photo.user_id');
        $query = $builder->get();
        $data['shared_comments'] = $query->getResult();

        $report = new UsersreportModel();

        $data['report'] = $report->where(['user_id' => session()->get('id'),  'post_id' => $id])->first();

        $db1 = \Config\Database::connect();
        $builder1 = $db1->table('community');
        $builder1->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.updated_at, community_photo.name');
        
        $builder1->join('users_community', 'users_community.community_id = community.id');
        $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
        $query1 = $builder1->get();
        $data['community'] = $query1->getResult();


        $db2 = \Config\Database::connect();
        $builder2 = $db1->table('community');
        $builder2->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.updated_at, community_photo.name');
        $builder2->where('community.id', $community_id);
        $builder2->join('community_photo', 'community_photo.id = community.com_photo_id');
        $query2 = $builder2->get();
        $data['community_current'] = $query2->getResult();;

      

        $com = new CommunityModel();
        $data['com'] = $com->where('id', $community_id)->first();


        echo view('templates/header', $data);
        echo view('post-shared', $data);
        // echo view('templates/footer', $data);
      

    }

    public function add_comment(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        $model = new PostcommentsModel;

        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $this->request->getPost('post_id'),
            'content' => $this->request->getPost('content')
        ];

        $msg = 'Commented';

        if($model->save($data)){
            return redirect()->to( base_url("/post-view/".$data['post_id']) )->with('msg', $msg);
        }

 
    }

    public function add_shared_comment(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        $model = new SharedcommentsModel;

        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $this->request->getPost('post_id'),
            'content' => $this->request->getPost('content')
        ];
        $community_id = $this->request->getPost('community_id');

        $msg = 'Commented';
    
        if($model->save($data)){

            return redirect()->to( base_url("/post-share/".$data['post_id'] ."/". $community_id  ) )->with('msg', $msg);
        }
    }


	//--------------------------------------------------------------------

}
