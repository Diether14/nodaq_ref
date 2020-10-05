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
use App\Models\CommunitycategoryModel;
use App\Models\CommunitysubclassModel;
use App\Models\ReportOptionsModel;
use App\Models\PostcommentrepliesModel;

class Community extends BaseController
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


    public function smile(){
        $data = [];
        helper(['form']);

        // echo view('templates/header', $data);
        echo view('smile', $data);
        // echo view('templates/footer', $data);
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

    public function play($slug = null, $id = null, $subclass_id = null){
        ini_set('display_errors', 1);
      
        $data = [];
        helper(['form']);
        helper('text');

        $subclass = new CommunitysubclassModel();
        $get_subclass = $subclass->where('id', $subclass_id)->first();
        
        $data['subclass'] = $get_subclass;

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status, community.questions, community_photo.name, community.questions');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        // echo '<pre>';
        // var_dump($data['community_list']);exit;

        // $model = new UserscommunityModel;

        // $data['users_community'] = $model->where(['user_id' => session()->get('id'), 'community_id' => $id])->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
    
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous,users_community.ban_reason,users_community.remove_ac_reason, users_community.created_at,
        community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status as community_status, community.questions,
        users.nickname, users.email, users.status as users_status,
        community_photo.name
        ');
        $builder->where('users_community.user_id', session()->get('id'));
        $builder->where('users_community.community_id', $id);
        $builder->join('community', 'community.id = users_community.community_id');
        $builder->join('users', 'community.user_id = users.id');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');

        $query   = $builder->get();
        $data['users_community'] = $query->getResult();

        $data['community_id'] = $id;

        $data['posts'] = array();
        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->where('users_post.community_id', $id);
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.content, users_post.updated_at, users_post.tags, users_post.category_id, users_post.subclass_id, users.nickname, profile_photo.name, community_category.category_name, community_category_subclass.subclass'  );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder1->join('community_category', 'community_category.id = users_post.category_id', 'left');
        $builder1->join('community_category_subclass', 'community_category_subclass.id = users_post.subclass_id', 'left');
        $query1  = $builder1->get();
        $data['posts'] = $query1->getResult();  
        
        // echo '<pre>';
        // var_dump(unserialize($data['posts'][0][2]->content)); exit;

        // $db2      = \Config\Database::connect();
        // $builder2 = $db2->table('users_shared_posts');
        // $builder2->select('users_shared_posts.post_id, users_post.id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.description, users_post.updated_at, users.nickname,profile_photo.name, user_settings.user_mode');
        // $builder2->where('users_shared_posts.community_id', $id );
        
        // $builder2->join('users', 'users.id = users_shared_posts.user_id');
        // $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        // $builder2->join('profile_photo', 'users.id = profile_photo.user_id');
        // $builder2->join('user_settings', 'users.id = user_settings.user_id');
        
        // $query2  = $builder2->get();

        // $data['posts'][] = $query2->getResult();  
        
        $users_community_count = new UserscommunityModel();

        // $data['users_community'] = $users_community_count->where('community_id', $id)->countAllResults();
        
        $db3      = \Config\Database::connect();
        $builder3 = $db3->table('users_community');
        $builder3->where('users_community.community_id', $id);
        $builder3->select('users_community.id, users.nickname, users_community.user_id, profile_photo.name');
        $builder3->join('users', 'users_community.user_id = users.id');
        $builder3->join('profile_photo', 'profile_photo.user_id = users.id');
        $query3   = $builder3->get();
        $data['users'] = $query3->getResult();
        
        // echo '<pre>';
        // var_dump($data['users']);exit;

        $model = new CommunitysubclassModel;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community_category');
        $builder->select('community_category.id, community_category.user_id, community_category.community_id,, community_category.category_name, community_category.updated_at');
        $builder->where(['community_category.community_id' => $id]);
        // $builder->join('community_category_subclass', 'community_category_subclass.category_id = community_category.id');                
        $query   = $builder->get();
        $data['community_category'] = $query->getResult();


        $category = new CommunitycategoryModel;
        $categories = $category->where('community_id', $id)->findAll();

        foreach ($categories as $key => $value) {
            $subclass = $model->where('category_id', $value['id'])
            ->findAll();

            $categories[$key]['subclass'] = $subclass;

        }
 
        $data['community_category'] = $categories;


        // echo '<pre>';
        // var_dump($data['category']);exit;

        echo view('templates/header', $data);
        // echo "<pre>";
        // var_dump($data);
        // exit;
        echo view('community/view', $data);
        echo view('templates/footer', $data); 
    }

    public function upload_picture(){
        ini_set('display_errors', 1);
        helper(['form']);

        $target_dir = base_url()."/public/editorjs/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $url = base_url().'/public/editorjs/uploads/'.basename($_FILES["image"]["name"]);
        $file = $this->request->getFile('image');
       
        if ($file->move('public/editorjs/uploads')) {
            $data = ['success' => 1, 
            'file' => ['url' => $url] 
            ];
            echo json_encode($data);
        } else {
            $data = ['success' => 0, 
            'file' => ['url' => $url] 
            ];
            echo json_encode($data);
        }
    }

    public function community_private($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');

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

        $data['posts'] = array();
        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->where('users_post.community_id', $id);
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users.nickname, profile_photo.name, user_settings.user_mode'  );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder1->join('user_settings', 'users.id = user_settings.user_id');
        $query1  = $builder1->get();
        $data['posts'][] = $query1->getResult();  

        $db2      = \Config\Database::connect();
        $builder2 = $db2->table('users_shared_posts');
        $builder2->select('users_shared_posts.post_id, users_post.id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users.nickname,profile_photo.name, user_settings.user_mode');
        $builder2->where('users_shared_posts.community_id', $id );
        
        $builder2->join('users', 'users.id = users_shared_posts.user_id');
        $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        $builder2->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder2->join('user_settings', 'users.id = user_settings.user_id');
        
        $query2  = $builder2->get();

        $data['posts'][] = $query2->getResult();  
        
        $users_community_count = new UserscommunityModel();

        $data['users_community'] = $users_community_count->where('community_id', $id)->countAllResults();
        

        //users in the community
        $db3      = \Config\Database::connect();
        $builder3 = $db3->table('users_community');
        $builder3->where('users_community.community_id', $id);
        $builder3->select('users_community.id, users.nickname, users_community.user_id, profile_photo.name');
        $builder3->join('users', 'users_community.user_id = users.id');
        $builder3->join('profile_photo', 'profile_photo.user_id = users.id');
        $query3   = $builder3->get();
        $data['users'] = $query3->getResult();

  
        $join_community = new JoincommunityfilesModel();

        //join button
        $data['join_community'] = $join_community->where(['user_id' => session()->get('id'), 'community_id' => $id])->first();
        

        echo view('templates/header', $data);
        echo view('community-private', $data);
        echo view('templates/footer', $data); 
    }

       
    public function save_post(){
        ini_set('display_errors', 1);
        helper(['form', 'url']);

        $title = $this->request->getPost('title');
        $content = $_POST['content']['blocks'];
        $community_id = $this->request->getPost('community_id');
        $category_id = $this->request->getPost('category_id');
        $subclass_id = $this->request->getPost('subclass_id');
        $tags = $this->request->getPost('tags');

        $db      = \Config\Database::connect();
        $builder = $db->table('users_post');

        $data = [
        'user_id' => session()->get('id'),
        'community_id' => $community_id,
        'title' => $title,
        'content' => serialize($content),
        'tags' => $tags,
        'category_id' => $category_id,
        'subclass_id' => $subclass_id,
        ];
        
        $save = $builder->insert($data);
        if($save){

          $response = [
           'success' => true,
           'data' => $save,
           'msg' => "Blog has been posted!"
          ];
        }else{
            $response = [
                'success' => false,
                'data' => '',
                'msg' => "There is an error!"
               ];
        }
          return $this->response->setJSON($response);
    }
    

    //community accept user
    public function accept_user_community(){
        ini_set('display_errors', 1);

        helper(['form', 'url']);
    
        $data = [   
            'user_id' => $this->request->getPost('user_id'),
            'community_id' => $this->request->getPost('community_id'),
            'status' => '1'
          ];

        $db      = \Config\Database::connect();
        $builder = $db->table('emoticon_store');
        // $community_id = $this->request->getPost('community_id');
        $builder->where(['user_id' => $user_id, 'community_id' => $community_id]);
        $update = $builder->update($data);
        if($update){
          $msg = 'User has been accepted';
        }else{
          $msg = 'There is an error!';
        }
  
    }
    
    //community decline user
    public function reject_user_community($user_id = null){
        ini_set('display_errors', 1);

        helper(['form', 'url']);
        
          
        $data = [   
            'user_id' => $this->request->getPost('user_id'),
            'community_id' => $this->request->getPost('community_id'),
            'status' => '0'
          ];

        $db      = \Config\Database::connect();
        $builder = $db->table('emoticon_store');

        $builder->where(['user_id' => $user_id, 'community_id' => $community_id]);
        $update = $builder->update($data);
        if($update){
          $msg = 'User has been accepted';
        }else{
          $msg = 'There is an error!';
        }
    }

    public function community_home(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);
        helper(['text']);

        $model = new UserspostModel();


        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
    
        $builder->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.created_at, community.color , community.text_color, community_photo.name, users.nickname, community.slug,
        community_category_subclass.id as subclass_id');
        $builder->where('community.community_type', '0');
        $builder->where('community.user_id !=', session()->get('id'));
        //add where for recommended
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('users', 'community.user_id = users.id');
        $builder->join('community_category_subclass', 'community.id = community_category_subclass.community_id');

        $query   = $builder->get();
        $data['recommended_community'] = $query->getResult();

        //         echo '<pre>';
        // var_dump($data['recommended_community']);exit;

        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous,users_community.ban_reason,users_community.remove_ac_reason, users_community.created_at,
        community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status as community_status, community.questions,
        users.nickname, users.email, users.status as users_status,
        community_photo.name, community.slug, community_category_subclass.id as subclass_id
        ');
        $builder->where('users_community.user_id', session()->get('id'));
        $builder->join('community', 'community.id = users_community.community_id');
        $builder->join('users', 'community.user_id = users.id');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder->join('community_category_subclass', 'community.id = community_category_subclass.community_id');
        
        $query   = $builder->get();
        $data['your_communities'] = $query->getResult();


        $builder1 = $db->table('community');
    
        $builder1->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name, users.nickname, community.slug');
        $builder1->where('community.user_id', session()->get('id'));
        $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder1->join('users', 'community.user_id = users.id');
        
        $query1   = $builder1->get();
        $data['communities_you_manage'] = $query1->getResult();


        echo view('templates/header', $data);
        echo view('community/home', $data);
        echo view('templates/footer', $data);

    }

    // user landing homepage
    public function communities(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);
        helper(['text']);

        $model = new UserspostModel();


        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();


        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous,users_community.ban_reason,users_community.remove_ac_reason, users_community.created_at,
        community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status as community_status, community.questions,
        users.nickname, users.email, users.status as users_status,
        community_photo.name, community.slug, community_category_subclass.id as subclass_id');

        $builder->where('users_community.user_id', session()->get('id'));
        $builder->join('community', 'community.id = users_community.community_id');
        $builder->join('users', 'community.user_id = users.id');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');

        $builder->join('community_category_subclass', 'community.id = community_category_subclass.community_id');
        $query   = $builder->get();
        $data['your_communities'] = $query->getResult();

        // echo '<pre>';
        // var_dump($data['community_list']);exit;

        $builder1 = $db->table('community');
    
        $builder1->select('community.id, community.user_id, community.slug, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name, users.nickname');
        $builder1->where('community.user_id', session()->get('id'));
        $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder1->join('users', 'community.user_id = users.id');
  
        $query1   = $builder1->get();
        $data['communities_you_manage'] = $query1->getResult();


        echo view('templates/header', $data);
        echo view('community/list', $data);
        echo view('templates/footer', $data);
    }


    

    public function manage_community($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');

        $profile_photo = new ProfilephotoModel();
        $data['profile_photo'] = $profile_photo->where('user_id', session()->get('id'))
            ->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status, community.questions, community_photo.name, community.questions');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();

        // echo '<pre>';
        // var_dump($data['community_list']);exit;

        // $model = new UserscommunityModel;

        // $data['users_community'] = $model->where(['user_id' => session()->get('id'), 'community_id' => $id])->first();

        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
    
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous,users_community.ban_reason,users_community.remove_ac_reason, users_community.created_at,
        community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status as community_status, community.questions,
        users.nickname, users.email, users.status as users_status,
        community_photo.name
        ');
        $builder->where('users_community.user_id', session()->get('id'));
        $builder->where('users_community.community_id', $id);
        $builder->join('community', 'community.id = users_community.community_id');
        $builder->join('users', 'community.user_id = users.id');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');

        $query   = $builder->get();
        $data['users_community'] = $query->getResult();
        
        $data['community_id'] = $id;

        $data['posts'] = array();
        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('users_post');
        $builder1->where('users_post.community_id', $id);
        $builder1->select('users_post.id,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users_post.tags, users_post.category_id, users_post.subclass_id, users.nickname, profile_photo.name, community_category.category_name, community_category_subclass.subclass'  );
        $builder1->join('users', 'users.id = users_post.user_id');
        $builder1->join('profile_photo', 'users.id = profile_photo.user_id');
        $builder1->join('community_category', 'community_category.id = users_post.category_id', 'left');
        $builder1->join('community_category_subclass', 'community_category_subclass.id = users_post.subclass_id', 'left');
        $query1  = $builder1->get();
        $data['posts'][] = $query1->getResult();  

        // $db2      = \Config\Database::connect();
        // $builder2 = $db2->table('users_shared_posts');
        // $builder2->select('users_shared_posts.post_id, users_post.id, users_shared_posts.content ,users_post.user_id, users_post.community_id, users_post.title, users_post.updated_at, users.nickname,profile_photo.name, user_settings.user_mode');
        // $builder2->where('users_shared_posts.community_id', $id );
        
        // $builder2->join('users', 'users.id = users_shared_posts.user_id');
        // $builder2->join('users_post', 'users_post.id = users_shared_posts.post_id');
        // $builder2->join('profile_photo', 'users.id = profile_photo.user_id');
        // $builder2->join('user_settings', 'users.id = user_settings.user_id');
        
        // $query2  = $builder2->get();

        // $data['posts'][] = $query2->getResult();  
        
        $users_community_count = new UserscommunityModel();

        // $data['users_community'] = $users_community_count->where('community_id', $id)->countAllResults();
        
        $db3      = \Config\Database::connect();
        $builder3 = $db3->table('users_community');
        $builder3->where('users_community.community_id', $id);
        $builder3->select('users_community.id, users.nickname, users_community.user_id, profile_photo.name');
        $builder3->join('users', 'users_community.user_id = users.id');
        $builder3->join('profile_photo', 'profile_photo.user_id = users.id');
        $query3   = $builder3->get();
        $data['users'] = $query3->getResult();
        
        // echo '<pre>';
        // var_dump($data['users']);exit;

        $category = \Config\Database::connect();
        $builderCategory = $category->table('community_category');
        $builderCategory->where('community_id', $id);
        $builderCategory->select('*');
        $queryCategory = $builderCategory->get();
        $data['category'] = $queryCategory->getResult();

        // echo '<pre>';
        // var_dump($data['category']);exit;
        $model = new CommunitysubclassModel;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community_category');
        $builder->select('community_category.id, community_category.user_id, community_category.community_id,, community_category.category_name, community_category.updated_at');
        $builder->where(['community_category.community_id' => $id]);
        // $builder->join('community_category_subclass', 'community_category_subclass.category_id = community_category.id', 'left');                
        $query   = $builder->get();
        $data['community_category'] = $query->getResult();
    
        $category = new CommunitycategoryModel;
        $categories = $category->where('community_id', $id)->findAll();

        foreach ($categories as $key => $value) {
            $subclass = $model->where('category_id', $value['id'])
            ->findAll();

            $categories[$key]['subclass'] = $subclass;

        }

        $data['community_category'] = $categories;

        echo view('templates/header', $data);
        echo view('community/manage', $data);
        echo view('templates/footer', $data); 
    }

    public function manage_members($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status, community.questions, community_photo.name, community.questions');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');

        $query   = $builder->get();
        $data['community_list'] = $query->getResult();
    
        $category = \Config\Database::connect();
        $builderCategory = $category->table('community_category');
        $builderCategory->where('community_id', $id);
        $builderCategory->select('*');
        $queryCategory = $builderCategory->get();
        $data['category'] = $queryCategory->getResult();

        $model = new CommunitysubclassModel;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community_category');
        $builder->select('community_category.id, community_category.user_id, community_category.community_id,, community_category.category_name, community_category.updated_at');
        $builder->where(['community_category.community_id' => $id]);
        // $builder->join('community_category_subclass', 'community_category_subclass.category_id = community_category.id', 'left');                
        $query   = $builder->get();
        $data['community_category'] = $query->getResult();
    
        $category = new CommunitycategoryModel;
        $categories = $category->where('community_id', $id)->findAll();

        foreach ($categories as $key => $value) {
            $subclass = $model->where('category_id', $value['id'])
            ->findAll();

            $categories[$key]['subclass'] = $subclass;

        }

        $data['community_category'] = $categories;

        
        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous, users.nickname, users.email, profile_photo.name, users_community.answer, 
        community_ac_settings.remove_comments,community_ac_settings.remove_posts,community_ac_settings.punish_users,community_ac_settings.remove_posts_from_hotboard,
        community_ac_settings.edit_cover_photo, community_ac_settings.edit_categories, community_ac_settings.edit_subclass, community_ac_settings.notice,
        community_ac_settings.general, community_ac_settings.politic');
        $builder->where(['users_community.community_id' => $id]);
        $builder->where('users_community.status !=', '3');
        $builder->join('users', 'users_community.user_id = users.id');
        $builder->join('profile_photo', 'users_community.user_id = profile_photo.user_id', 'left');
        $builder->join('community_ac_settings', 'users_community.user_id = community_ac_settings.user_id', 'left');
        
        $query   = $builder->get();
        $data['users'] = $query->getResult();

        echo view('templates/header', $data);
        echo view('community/list-members', $data);
        echo view('templates/footer', $data);
    }
    
    public function manage_reports($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status, community.questions, community_photo.name, community.questions');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();
    
        $category = \Config\Database::connect();
        $builderCategory = $category->table('community_category');
        $builderCategory->where('community_id', $id);
        $builderCategory->select('*');
        $queryCategory = $builderCategory->get();
        $data['category'] = $queryCategory->getResult();

        $model = new CommunitysubclassModel;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community_category');
        $builder->select('community_category.id, community_category.user_id, community_category.community_id,, community_category.category_name, community_category.updated_at');
        $builder->where(['community_category.community_id' => $id]);
        // $builder->join('community_category_subclass', 'community_category_subclass.category_id = community_category.id', 'left');                
        $query   = $builder->get();
        $data['community_category'] = $query->getResult();
    
        $category = new CommunitycategoryModel;
        $categories = $category->where('community_id', $id)->findAll();

        foreach ($categories as $key => $value) {
            $subclass = $model->where('category_id', $value['id'])
            ->findAll();

            $categories[$key]['subclass'] = $subclass;

        }
        $data['community_id'] = $id;

        $db      = \Config\Database::connect();
        $builder = $db->table('users_report');
        $builder->select('users_report.id, users_report.reported_by_user_id, users_report.community_id, users_report.post_id, users_report.user_id, users_report.report_content, users_report.created_at,
        users.nickname,users.email, users_post.title, users_post.content, community.title as community_title');
        $builder->where(['users_report.community_id' => $id]);
        $builder->join('users', 'users.id = users_report.reported_by_user_id');
        $builder->join('users_post', 'users_post.id = users_report.post_id');
        $builder->join('community', 'community.id = users_report.community_id');

        $query   = $builder->get();
        $data['reported_posts'] = $query->getResult();

        $data['community_category'] = $categories;

        echo view('templates/header', $data);
        echo view('community/manage-reports', $data);
        echo view('templates/footer', $data);
    }

    public function manage_blocked_users($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status, community.questions, community_photo.name, community.questions');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();
    
        $category = \Config\Database::connect();
        $builderCategory = $category->table('community_category');
        $builderCategory->where('community_id', $id);
        $builderCategory->select('*');
        $queryCategory = $builderCategory->get();
        $data['category'] = $queryCategory->getResult();

        $model = new CommunitysubclassModel;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community_category');
        $builder->select('community_category.id, community_category.user_id, community_category.community_id,, community_category.category_name, community_category.updated_at');
        $builder->where(['community_category.community_id' => $id]);
        // $builder->join('community_category_subclass', 'community_category_subclass.category_id = community_category.id', 'left');                
        $query   = $builder->get();
        $data['community_category'] = $query->getResult();
    
        $category = new CommunitycategoryModel;
        $categories = $category->where('community_id', $id)->findAll();

        foreach ($categories as $key => $value) {
            $subclass = $model->where('category_id', $value['id'])
            ->findAll();

            $categories[$key]['subclass'] = $subclass;

        }

        $data['community_category'] = $categories;

        $data['community_id'] = $id;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.ban_reason, users_community.post, users_community.comment, users_community.share, users_community.report, users_community.upvote_devote,users_community.status, users_community.anounymous, users.nickname, users.email, profile_photo.name, 
        community_ac_settings.remove_comments,community_ac_settings.remove_posts,community_ac_settings.punish_users,community_ac_settings.remove_posts_from_hotboard,
        community_ac_settings.edit_cover_photo, community_ac_settings.edit_categories, community_ac_settings.edit_subclass, community_ac_settings.notice,
        community_ac_settings.general, community_ac_settings.politic');
        $builder->where(['users_community.community_id' => $id]);
        $builder->where('users_community.status =', '3');
        $builder->join('users', 'users_community.user_id = users.id');
        $builder->join('profile_photo', 'users_community.user_id = profile_photo.user_id', 'left');
        $builder->join('community_ac_settings', 'users_community.user_id = community_ac_settings.user_id', 'left');
        
        $query   = $builder->get();
        $data['users'] = $query->getResult();


        echo view('templates/header', $data);
        echo view('community/list-users-blocked', $data);
        echo view('templates/footer', $data);
    }
    public function manage_settings($id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);
        helper('text');

        $db      = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->where('community.id', $id);
        $builder->select('community.id, community.user_id, community.com_photo_id,community.title, community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.category, community.status, community.questions, community_photo.name, community.questions');
        $builder->join('community_photo', 'community_photo.id = community.com_photo_id');
        
        $query   = $builder->get();
        $data['community_list'] = $query->getResult();
    
        $category = \Config\Database::connect();
        $builderCategory = $category->table('community_category');
        $builderCategory->where('community_id', $id);
        $builderCategory->select('*');
        $queryCategory = $builderCategory->get();
        $data['category'] = $queryCategory->getResult();

        $model = new CommunitysubclassModel;
        
        $db      = \Config\Database::connect();
        $builder = $db->table('community_category');
        $builder->select('community_category.id, community_category.user_id, community_category.community_id,, community_category.category_name, community_category.updated_at');
        $builder->where(['community_category.community_id' => $id]);
        // $builder->join('community_category_subclass', 'community_category_subclass.category_id = community_category.id', 'left');                
        $query   = $builder->get();
        $data['community_category'] = $query->getResult();
    
        $category = new CommunitycategoryModel;
        $categories = $category->where('community_id', $id)->findAll();

        foreach ($categories as $key => $value) {
            $subclass = $model->where('category_id', $value['id'])
            ->findAll();

            $categories[$key]['subclass'] = $subclass;

        }

        $data['community_category'] = $categories;

        $data['community_id'] = $id;

        $db      = \Config\Database::connect();
        $builder = $db->table('users_report');
        $builder->select('*');
        $builder->where(['users_report.community_id' => $id]);
        
        // $builder->where('users_community.status !=', '3');
        // AND users_report.user_id = users.id
        // $builder->join('users', 'users_report.reported_by_user_id = users.id', 'left');
        // $builder->join('profile_photo', 'users_community.user_id = profile_photo.user_id', 'left');
        // $builder->join('community_ac_settings', 'users_community.user_id = community_ac_settings.user_id', 'left');
        
        $query   = $builder->get();
        $data['reported_posts'] = $query->getResult();
        // echo '<pre>';
        // var_dump($data['reported_posts']);exit;

        $builder1 = $db->table('community');
    
        $builder1->select('community.id, community.user_id, community.com_photo_id, community.title, community.upvote_name, community.devote_name,community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name, users.nickname, community.status, community.questions');
        $builder1->where('community.id', $id);
        $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder1->join('users', 'community.user_id = users.id');
        $query1   = $builder1->get();
        $data['community'] = $query1->getResult();

        echo view('templates/header', $data);
        echo view('community/settings', $data);
        echo view('templates/footer', $data);
    }

    public function add_category(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        
        $model = new CommunitycategoryModel;

        $community_id = $this->request->getPost('community_id');
        $data = [
            'user_id' => session()->get('id'),
            'community_id' => $community_id,
            'category_name' => $this->request->getPost('category_name')
        ];


        if($model->insert($data)){
            $category_id = $model->insertID();

            $subclass_model = new CommunitysubclassModel();

            $data = [
                'category_id' => $category_id,
                'user_id' => session()->get('id'),
                'community_id' => $community_id,
                'subclass' => 'Notice',
            ];
            $subclass_model->insert($data);

            $msg = 'Category has been added!';
            return redirect()->to( base_url().'/community-manage/'.$community_id)->with('msg', $msg);
        }
    }
   
    public function delete_category($id = null, $community_id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        
        $model = new CommunitycategoryModel;
        $delete = $model->delete($id);

        if($delete){
            $msg = 'Category has been deleted!';
            return redirect()->back()->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';
            return redirect()->back()->with('msg', $msg);
        }
    }

  

    public function update_category(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        
        $model = new CommunitycategoryModel;

        $community_id = $this->request->getPost('community_id');
        $data = [
            'id' => $this->request->getPost('id'),
            'user_id' => session()->get('id'),
            'community_id' => $community_id,
            'category_name' => $this->request->getPost('category_name')
        ];

        if($model->update($data['id'], $data)){
            $msg = 'Category has been updated!';
            return redirect()->back()->with('msg', $msg);
        }else{
            $msg = 'Failed to update!';
            return redirect()->back()->with('msg', $msg);
        }
    }

    public function add_subclass(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        
        $model = new CommunitysubclassModel();
        $community_id = $this->request->getPost('community_id');

        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'user_id' => session()->get('id'),
            'community_id' => $community_id,
            'subclass' => $this->request->getPost('subclass'),
        ];

        if($model->insert($data)){
            $msg = 'Subclass has been added!';
            return redirect()->back()->with('msg', $msg);
        }else{
            $msg = 'Failed to add!';
            return redirect()->back()->with('msg', $msg);
        }
    }

    public function update_subclass(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        

        $model = new CommunitysubclassModel;

        $community_id = $this->request->getPost('community_id');
        $data = [
            'id' => $this->request->getPost('id'),
            'user_id' => session()->get('id'),
            'subclass' => $this->request->getPost('subclass')
        ];

        if($model->update($data['id'], $data)){
            $msg = 'Category has been updated!';
            return redirect()->back()->with('msg', $msg);
        }else{
            $msg = 'Failed to update!';
            return redirect()->back()->with('msg', $msg);
        }
    }

    
    public function delete_subclass($id = null, $community_id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        
        $model = new CommunitysubclassModel;
        $delete = $model->delete($id);

        if($delete){
            $msg = 'Subclass has been deleted!';
            return redirect()->back()->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';
            return redirect()->back()->with('msg', $msg);
        }
    }

    
    public function user_join(){
        ini_set('display_errors', 1);
        
        helper(['form', 'url']);
   
        $db      = \Config\Database::connect();
        $builder = $db->table('join_community_files');
  
        $msg = 'Please select a valid files';
 
        if ($this->request->getFileMultiple('file')) {
      
             foreach($this->request->getFileMultiple('file') as $file)
             {   
  
                $file->move('public/user/uploads/community-join');
  
              $data = [
                'user_id' => session()->get('id'),
                'community_id' =>  $this->request->getPost('community_id'),
                'name' =>  $file->getClientName(),
                'type'  => $file->getClientMimeType()
              ];
  
              $save = $builder->insert($data);
             }
             $msg = 'Your request has been sent!';
             return redirect()->to( base_url('/community-private/'. $this->request->getPost('community_id')) )->with('msg', $msg);
        }
    }

    public function join_community(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);

        $model = new UserscommunityModel;

        $community_id = $this->request->getPost('community_id');
        $answer = $this->request->getPost('answer');

        $data = [
            'user_id' => session()->get('id'),
            'community_id' => $community_id,
            'answer' => $answer
        ];

        if($model->save($data)){
            $msg = 'Your request has been sent';
        }else{
            $msg = 'There is an error';
        }

        
        return redirect()->back()->with('msg', $msg);
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
            'report_content' => $this->request->getPost('report_content'),
            'report_option_id' => $this->request->getPost('report_option')
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
        $post_id =$this->request->getPost('post_id');
        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $post_id,
            'community_id' => $community_id,
            'content' => $this->request->getPost('share_content')
        ];

        if($model->insert($data)){
            $msg = 'Shared Post!';
            return redirect()->to( base_url().'/post-share/'.$post_id. '/' .$community_id)->with('msg', $msg);
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

    public function upvote(){
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
            

            $update = $model->delete($user_vote['id']);

            $msg = 'Upvoted';
            return redirect()->back()->with('msg', $msg);

        }
    }


    public function sub_category(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('manager-community/create-subcategory', $data);
        echo view('templates/footer', $data); 
    }
    public function category(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('manager-community/create-category', $data);
        echo view('templates/footer', $data); 
    }   



    public function manager_create_community(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('manager-community/create-category', $data);
        echo view('templates/footer', $data); 
    }

    public function community(){
        // echo 'test';exit;
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);
        helper('text');
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



        $assistant = new CommunityassistantmanagersModel();
        $get_assistant = $assistant->where('user_id', session()->get('id'))->findAll();

        $db1      = \Config\Database::connect();
        $builder1 = $db1->table('community');
    
        $builder1->select('community.id, community.user_id, community.com_photo_id, community.title, community.community_type, community.content, community.updated_at, community.color , community.text_color, community_photo.name, users.nickname');
        $builder1->where('community.id', $get_assistant[0]['community_id']);
        $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
        $builder1->join('users', 'community.user_id = users.id');
        
        $query1   = $builder1->get();
        $data['community_list_manager'] = $query1->getResult();
   

        echo view('templates/header', $data);
        echo view('community', $data);
        echo view('templates/footer', $data); 
    }

    public function save_community(){
            ini_set('display_errors', 1);    

        
            helper(['form', 'url']);

            $community_photo = new CommunityphotoModel();
         
            $rules = [
                'title' => 'required|min_length[3]|max_length[100]',
                'content' => 'required|min_length[3]|max_length[500]',
                'community_slug' => 'required|min_length[3]|max_length[500]',
            ];
    
            $msg = 'Please select a valid file';
     
                $data = [
                    'name' =>  'profile_city.jpg'
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
                        'slug' => $this->request->getPost('community_slug'),
                        ];
                    
                    if($model->insert($newData)){
                        $community_last_id = $model->insertID();

                        $category = new CommunitycategoryModel;

                        $category_data = [
                            'user_id' => session()->get('id'),
                            'community_id' => $community_last_id,
                            'category_name' => 'Category' 
                        ];

                        if($category->insert($category_data)){
                            $category_last_id = $category->insertID();

                            $subclass = new CommunitysubclassModel;

                            $subclass_data = [
                                'user_id' => session()->get('id'),
                                'community_id' => $community_last_id,
                                'category_id' => $category_last_id,
                                'subclass' => 'Notice'
                            ];

                            $subclass->insert($subclass_data);
                            
                        }
                        $msg = 'Successfully added!';
                    }
                }else{
                    $msg = 'There is an error!';
                }
    
                
            // }
    
        // }
    
           
    
    
            return redirect()->to( 'home')->with('msg', $msg);
     
        }

        public function post_view($id = NULL){
            ini_set('display_errors', 1);
    
            $data = [];
            helper(['form', 'url']);
    
            $model = new UserspostModel();
            $user = new UserModel();
            $share = new UserssharedpostModel();
            $communityModel = new CommunityModel();
            
    
            $data['communities'] = $communityModel->find();
            $data['blog'] = $model->where('id', $id)->first();
            $data['shared'] = $share->where('post_id', $id)->where('community_id', $data['blog']['community_id'])->first();
    
            $data['users_community'] = $model->where('user_id', session()->get('id'))->where('community_id', $data['blog']['community_id'])->first();
    
            $profile_photo = new ProfilephotoModel();
            $data['profile_photo1'] = $profile_photo->where('user_id',$data['blog']['user_id'])
                ->first();
            
            $data['user'] = $user->where('id',$data['blog']['user_id'])
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
            $builder1->select('community.id, community.user_id, community.com_photo_id, community.title, community.status , community.community_type, community.content, community.color, community.text_color, community.upvote_name, community.devote_name, community.updated_at, community_photo.name');
            $builder1->where('users_community.user_id', session()->get('id'));
            $builder1->join('users_community', 'users_community.community_id = community.id');
            $builder1->join('community_photo', 'community_photo.id = community.com_photo_id');
            $query1 = $builder1->get();
            $data['community'] = $query1->getResult();

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
    
            $data['upvote'] = $voteModel->where('user_id', session()->get('id'))->where('post_id', $id)->where('community_id', $data['blog']['community_id'])->first();
            
            $comments = new PostcommentsModel();
            $data['comments_total'] = $comments->where('post_id', $id)->countAllResults();

            $report_model = new ReportOptionsModel();

            $data['report_options'] = $report_model->findAll();

            $data['vote_totals'] = $voteModel->where('post_id', $id)->where('community_id', $data['blog']['community_id'])->where('status', '1')->countAllResults();
            $commentRepliesModel = new PostcommentrepliesModel;
            $data['post_comment_replies'] = $commentRepliesModel->where('post_id', $id)->get()->getResult();
           
            echo view('templates/header', $data);
            echo view('community/post-view', $data);
            echo view('templates/footer', $data);
        }

        
    public function add_comment(){
        ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        $model = new PostcommentsModel;
        $post_id = $this->request->getPost('post_id');
        $content = $this->request->getPost('content');
        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $post_id,
            'content' => $content
        ];

        if($model->save($data)){
            $response = [
                'success' => false,
                'data' => $data,
                'msg' => "Commented!"
               ];
            
        }else{
            $response = [
                'success' => false,
                'data' => '',
                'msg' => "There is an error!"
               ];
        }
        return $this->response->setJSON($response);

    }

    
    public function add_comment_reply(){
        ini_set('display_errors', 1);
        $model = new PostcommentrepliesModel;
        // echo "watdaef";
        // var_dump($this->request->getPost());
        // exit;
        if($model->save($this->request->getPost())){
            $response = [
                'success' => false,
                'data' => $this->request->getPost(),
                'msg' => "Commented!"
            ];
        }else{
            $response = [
                'success' => false,
                'data' => '',
                'msg' => "There is an error!"
               ];
        }
        return $this->response->setJSON($response);
    }
    

    // @Lxp
    public function searchCommunity(){
        // echo "sup";
        // var_dump($this->request->getPost()["searchQuery"]);
        $db = \Config\Database::connect();
        $builder = $db->table('community');
        $builder->like('title', $this->request->getPost()["searchQuery"]);
        $query = $builder->get();
        
        echo json_encode($query->getResult());
        exit;
    }


}


?>