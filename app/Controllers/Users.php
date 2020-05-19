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
        // if ($this->request->getMethod() == 'post') {
        // }
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
            return redirect()->to('weendi/');
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
                $this->setUserSession($user);
                if($user['user_type'] == '3'){
                    return redirect()->to('admin');
                }elseif($user['user_type'] == '0'){
                    return redirect()->to('/weendi/dashboard');
                }else{
                    return redirect()->to('weendi/');
                }

                
            }else{
                return redirect()->to('weendi/');
            }
            
        }


    }


    
    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'nickname' => $user['nickname'],
            'email' => $user['email'],
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
                // 'firstname' => 'required|min_length[3]|max_length[20]',
                // 'lastname' => 'required|min_length[3]|max_length[20]',
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
                    // 'firstname' => $this->request->getVar('firstname'),
                    // 'lastname' => $this->request->getVar('lastname'),
                    'nickname' => $this->request->getVar('nickname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password')
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/weendi');
            
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
                return redirect()->to('/weendi/settings');
            
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
        $model = new UserModel();

        // if ($this->request->getMethod() == 'post') {
        //     $rules = [
        //         'nickname' => 'required|min_length[3]|max_length[20]',
        //     ];
            
        //     if($this->request->getPost('password') != ''){
        //         $rules['password'] = 'required|min_length[8]|max_length[255]';
        //         $rules['password_confirm'] = 'matches[password]';
                
        //     }

        //     if (! $this->validate($rules)) {
        //         $data['validation'] = $this->validator;
        //     }else{

        //         $newData = [
        //             'id' => session()->get('id'),
        //             'nickname' => $this->request->getPost('nickname'),
        //         ];

        //         if($this->request->getPost('password') != ''){
        //             $newData['password'] = $this->request->getPost('password');
        //         }

        //         $model->save($newData);
        //         // $session = session();
        //         session()->setFlashdata('success', 'Successful Updated');
        //         return redirect()->to('/weendi/profile');
            
        //     }
        // }
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
        
        $data['posts'] = $posts->where('user_id',  session()->get('id'))
        ->findAll();
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community');
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color, community_photo.name');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('users_community', 'users_community.community_id = community.id');

        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        $db2      = \Config\Database::connect();
        $builder2 = $db2->table('users_shared_posts');
        $builder2->select('users_shared_posts.id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.description, users_post.updated_at, users.nickname');
        $builder2->join('users', 'users.id = users_shared_posts.user_id');
        $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        
        $query2  = $builder2->get();
        $data['shared'] = $query2->getResult();  

        
        echo view('templates/header', $data);
        echo view('profile');
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
                return redirect()->to('/weendi/profile');
            
            }
        }        
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/weendi');
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

    public function save_post(){
        ini_set('display_errors', 1);
        helper(['form', 'url']);
        $model = new UserspostModel();

        $data = array(
            'user_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'community_id' => $this->request->getPost('community_id'),
            'description' => $this->request->getPost('description')
        );

        $insert = $model->save($data);
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

    public function dashboard(){
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
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
    
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);

    }

    public function post_view($id = NULL){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form', 'url']);
        // $db      = \Config\Database::connect();
        // $builder = $db->table('profile_photo');
        // $query   = $builder->get(); 

        // test($query);

        $model = new UserspostModel();
    

        $data['blog'] = $model->where('id', $id)->first();
    
        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();
        // $user_model = new UserModel();
        

        $post_model = new PostcommentsModel();
        
        $data['post_comments'] = $post_model->where('post_id', $id)->findAll();

        $report = new UsersreportModel();

        $data['report'] = $report->where(['user_id' => session()->get('id'),  'post_id' => $id])->first();

        $community = new CommunityModel();
        $data['community'] = $community->findAll();

        echo view('templates/header', $data);
        echo view('post-view', $data);
        echo view('templates/footer', $data);
      



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

        $msg = 'Successfully Added';

        if($model->save($data)){
            return redirect()->to( base_url("/post-view/".$data['post_id']) )->with('msg', $msg);
        }

 
    }


	//--------------------------------------------------------------------

}
