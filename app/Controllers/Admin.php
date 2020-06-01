<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CommunityModel;
use App\Models\CommunityphotoModel;
use App\Models\UserspostModel;
use App\Models\UsersreportModel;
use App\Models\ProfilephotoModel;
use App\Models\UserscommunityModel;
use App\Models\CommunitybannedusersModel;
use App\Models\UsersvoteModel;

class Admin extends BaseController
{
	public function index()
	{
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        $community = new CommunityModel;
        $posts = new UserspostModel;
        $reports = new UsersreportModel();

        $data['community'] = $community->countAll();
        $data['posts'] = $posts->countAll();
        $data['reports'] = $reports->countAll();
  

        echo view('admin/templates/header', $data);
        echo view('admin/index', $data);
        echo view('admin/templates/footer', $data);
    }

    public function create_community(){
        $data = [];
        helper(['form']);

        echo view('admin/templates/header', $data);
        echo view('admin/create-community', $data);
        echo view('admin/templates/footer', $data);
    }

    public function save_community(){  
        ini_set('display_errors', 1);



        helper(['form', 'url']);


        $community_photo = new CommunityphotoModel;
 
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

       

        
        // if (! $this->validate($rules)) {
        //     $data['validation'] = $this->validator;
        // }else{
        //     $model = new CommunityModel;

        //     $newData = [
        //         'user_id' => session()->get('id'),
        //         'title' => $this->request->getPost('title'),
        //         'content' => $this->request->getPost('content')
        //         ];
            
        //     if($model->insert($newData)){
        //         $last_id = $model->insertID();
                

        //         $msg = 'Successfully added!';
                
        //     }else{
        //         $msg = 'There is an error!';
        //     }
        // }


        
        // var_dump($last_id); exit;

        return redirect()->to( 'create-community')->with('msg', $msg);
 
    }

    public function community_table(){
        $data = [];
        helper(['form']);
        ini_set('display_errors', 1);


        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.user_id', session()->get('id'));
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');

        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        echo view('admin/templates/header', $data);
        echo view('admin/community-table', $data);
        echo view('admin/templates/footer', $data);
    }

    public function update_community(){
        ini_set('display_errors', 1);
        helper(['form', 'url']);

 
        $rules = [
            'title' => 'required|min_length[3]|max_length[20]',
            'content' => 'required|min_length[3]|max_length[500]',
        ];


        if(! $this->validate($rules)){
            $msg = $this->validator;
        }else{
  
                $model = new CommunityModel;

                if($this->request->getPost('community_type') == "on"){
                    $community_type = '1';
                }else{
                    $community_type = '0';
                }
        
                $id =  $this->request->getPost('id');
                $newData = [
                    'user_id' => session()->get('id'),
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'community_type' => $community_type,
                    'color' => $this->request->getPost('color'),
                    'text_color' => $this->request->getPost('text_color')
                    ];
                
                if($model->update($id,$newData)){
                    $msg = 'Successfully updated!';   
                }
        }

        return redirect()->to( 'community-table')->with('msg', $msg);
    }

    public function update_community_photo(){
        ini_set('display_errors', 1);
        helper(['form', 'url']);

        $community_photo = new CommunityphotoModel;
        $photo_id = $this->request->getPost('com_photo_id');

        
        $validated = $this->validate([
           'file' => [
               'uploaded[file]',
               'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
               'max_size[file,4096]',
           ],
       ]);
       $msg = 'Please select a valid file';

       if ($validated ) {
        $avatar = $this->request->getFile('file');
        $avatar->move('public/admin/uploads/community');

        $data = [
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
        ];
        $community_photo->update($photo_id ,$data);
        $msg = 'Update Successfuly!';
        }

        return redirect()->to( 'community-table')->with('msg', $msg);
    }

    public function delete_community($id = null){
        ini_set('display_errors', 1);
        helper(['form', 'url']);

        $model = new CommunityModel;
        $photo = new CommunityphotoModel;

        $data = $model->where('id', $id)->first();

        if($photo->where('id', $data['com_photo_id'])->delete()){     
            if($model->where('id', $id)->delete()){
                $msg = 'Delete Successfully!';
            }
        }
       else{
            $msg = 'There is an error!';
        }
        
        return redirect()->to( '/weendi/community-table')->with('msg', $msg);
    }

    public function reports_list(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);


        $db      = \Config\Database::connect();
        $builder = $db->table('users_report');
        
        $builder->select('users_report.id, users_report.user_id, users_report.community_id, users_report.post_id, users_report.report_content, users.nickname, users_report.updated_at, users_post.title');
        $builder->where('users_report.user_id', session()->get('id'));
        $builder->join('users', 'users_report.user_id = users.id');
        $builder->join('users_post', 'users_report.post_id = users_post.id');
        $query   = $builder->get();
        $data['reports_list'] = $query->getResult();

        echo view('admin/templates/header', $data);
        echo view('admin/post-reports-table', $data);
        echo view('admin/templates/footer', $data);
    }

    public function users_list(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        $users = new UserModel;
        $data['users'] = $users->where('user_type', 0)->findAll();

        $profile_photo = new ProfilephotoModel;
        $data['profile_photo'] = $profile_photo->findAll();
        // echo '<pre>';
        // var_dump($data['profile_photo']);exit;

        echo view('admin/templates/header', $data);
        echo view('admin/users', $data);
        echo view('admin/templates/footer', $data);
        
    }



    public function community_users($id = null){
        ini_set('display_errors', 1);
        
        $data = [];
        helper(['form']);

        $community = new CommunityModel;

        $data['community'] = $community->where('id', $id)->first();
         
        $model = new UserscommunityModel;
        $data['users_community'] = $model->select('user_id')->where('community_id', $id)->findAll();

        
        //should use whereIN
        $users = new UserModel;
        $data['users'] = $users->where('id', $data['users_community'][0]['user_id'])->first();

        echo view('admin/templates/header', $data);
        echo view('admin/community-users', $data);
        echo view('admin/templates/footer', $data);

    }

    public function community_ban_user(){
        ini_set('display_errors', 1);
        
        $data = [];
        helper(['form']);

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'community_id' => $this->request->getPost('community_id'), 
            'reason' => $this->request->getPost('reason')
        ];

        $model = new CommunitybannedusersModel();

        
        if($model->insert($data)){
            $msg = 'User has been banned!';
        }

        return redirect()->to( '/weendi/community-table')->with('msg', $msg);

    }

    public function community_admins(){
        ini_set('display_errors', 1);

        $data = [];

        $model = new UserModel();

        $data['community_admins'] = $model->whereIn('user_type', [1,2,3])->findAll();
  

        echo view('admin/templates/header', $data);
        echo view('admin/community-admins', $data);
        echo view('admin/templates/footer', $data);
    }

    public function community_create_admin(){
        ini_set('display_errors', 1);

        $data = [];


        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gender' => 'required',
                'birthdate' => 'required',
                'nickname' => 'required|min_length[3]|max_length[20]',
                'user_type' => 'required',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                
                $model = new UserModel();

                $newData = [
                    'gender' => $this->request->getVar('gender'),
                    'birthdate' => $this->request->getVar('birthdate'),
                    'user_type' => $this->request->getVar('user_type'),
                    'nickname' => $this->request->getVar('nickname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password')
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/weendi/community-create-admin');
            
            }
        }

        echo view('admin/templates/header', $data);
        echo view('admin/community-create-admin', $data);
        echo view('admin/templates/footer', $data);
           
    }

    public function update_admin_user(){
        ini_set('display_errors', 1);
        
        $data = [];
        helper(['form']);

        $rules = [
            'user_type' => 'required',
        ];

        if (! $this->validate($rules)) {
            $data['validation'] = $this->validator;
        }else{
            $newData = [
                'user_type' => $this->request->getPost('user_type')
            ];

            // var_dump($newData);exit;
            $model = new UserModel();

            if($model->update($this->request->getPost('user_id'), $newData)){
                $session = session();
                $session->setFlashdata('success', 'Update Successfully');
                return redirect()->to('/weendi/users-list');
            }
        }

    }

    public function vote_list($id = NULL){
        ini_set('display_errors', 1);

        $data = [];

        $model = new UserModel();
        $data['community_admins'] = $model->whereIn('user_type', [1,2,3])->findAll();
        
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users_report');
        
        // $builder->select('users_report.id, users_report.user_id, users_report.community_id, users_report.post_id, users_report.report_content, users.nickname, users_report.updated_at, users_post.title');
        // $builder->where('users_report.user_id', session()->get('id'));
        // $builder->join('users', 'users_report.user_id = users.id');
        // $builder->join('users_post', 'users_report.post_id = users_post.id');
        // $query   = $builder->get();
        // $data['reports_list'] = $query->getResult();


        echo view('admin/templates/header', $data);
        echo view('admin/vote-list', $data);
        echo view('admin/templates/footer', $data);
    }

    public function post_list($id = NULL){
        ini_set('display_errors', 1);

        $data = [];

        $db      = \Config\Database::connect();
        $builder = $db->table('users_post');
        
        $builder->select('users_post.id, users_post.user_id, users_post.community_id, users_post.title, users_post.description, users_post.content, users_post.updated_at, users.nickname');
        $builder->where('users_post.community_id', $id);
        $builder->join('users', 'users.id = users_post.user_id');
        $query   = $builder->get();
        $data['post_list'] = $query->getResult();


        // foreach ($data['post_list'] as $key => $value) {
            
        // }


        // $builder1 = $db->table('users_vote');
        // $builder1->where('users_vote.post_id', $data['post_list']->id);
        // echo $builder1->countAllResults();
        // var_dump($data['post_list'][]);
        // exit;
        echo view('admin/templates/header', $data);
        echo view('admin/post-list', $data);
        echo view('admin/templates/footer', $data);
    }


}
