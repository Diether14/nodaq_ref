<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CommunityModel;
use App\Models\CommunityphotoModel;
use App\Models\UserspostModel;
use App\Models\UsersreportModel;

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
            'content' => 'required|min_length[3]|max_length[500]'
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
                    'color' => $this->request->getPost('color')
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

        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color, community_photo.name');
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
        $builder->join('users', 'users_report.user_id = users.id');
        $builder->join('users_post', 'users_report.post_id = users_post.id');
        $query   = $builder->get();
        $data['reports_list'] = $query->getResult();

        echo view('admin/templates/header', $data);
        echo view('admin/post-reports-table', $data);
        echo view('admin/templates/footer', $data);
    }



}
