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
use App\Models\CommunityacsettingsModel;
use App\Models\CommunitysubclassModel;

class Managers extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }

    public function dashboard($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
        $data['community_id'] = $id;

        $user_posts = new UserspostModel();
        $members = new UserscommunityModel();
        $reports = new UsersreportModel();
        $category = new CommunitycategoryModel();
        $subclass = new CommunitysubclassModel();

        $data['total_posts'] = $user_posts->where('community_id', $id)->countAllResults();
        $data['total_members'] = $members->where('community_id', $id)->countAllResults();
        $data['total_reports'] = $reports->where('community_id', $id)->countAllResults();
        $data['total_category'] = $category->where('community_id', $id)->countAllResults();
        $data['total_subclass'] = $subclass->Where('community_id', $id)->countAllResults();

        $model = new CommunitycategoryModel;
        $data['community_category'] = $model->where(['user_id' => session()->get('id'), 'community_id' => $id])->find();

        echo view('templates/header', $data);
        echo view('manager-community/manage-community-dashboard', $data);
        echo view('templates/footer', $data);
    }

    public function category($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
        $data['community_id'] = $id;

        $model = new CommunitysubclassModel;
        
        // $data['community_category'] = $model->where(['user_id' => session()->get('id'), 'community_id' => $id])->find();

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
        echo view('manager-community/manage-community-category', $data);
        echo view('templates/footer', $data);
    }

    public function update_community_cover(){
        ini_set('display_errors', 1);
        helper(['form', 'url']);

        $db      = \Config\Database::connect();
             $builder = $db->table('community_photo');
            
             $validated = $this->validate([
                'file' => [
                    'uploaded[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[file,4096]',
                ]
                
            ]);
            $community_id = $this->request->getPost('community_id');
            $msg = 'Please select a valid file!';
            if ($validated) {
                $avatar = $this->request->getFile('file');
                $avatar->move('public/admin/uploads/community');
                
                $id = $this->request->getPost('com_photo_id'); 
                
              $data = [
              
                'name' =>  $avatar->getClientName(),
                'type'  => $avatar->getClientMimeType()
              ];
              
              $builder->where('id', $id);
              $update = $builder->update($data);
              if($update){
                $msg = 'Community cover photo has been updated';
              }else{
                $msg = 'Failed to update!';
              }
        
    
      }
      return redirect()->to( base_url('/manage-community/community-settings/'.$community_id) )->with('msg', $msg);
    }

    public function users($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
        $data['community_id'] = $id;


        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous, users.nickname, users.email, profile_photo.name, 
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
        echo view('manager-community/manage-community-users', $data);
        echo view('templates/footer', $data);
    }
   
    public function reported_posts($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
        $data['community_id'] = $id;

        $db      = \Config\Database::connect();
        $builder = $db->table('users_report');
        $builder->select('users_report.id, users_report.reported_by_user_id, users_report.community_id, users_report.post_id, users_report.user_id, users_report.report_content, users_report.created_at,
        users.nickname,users.email, users_post.title, users_post.description, users_post.content, community.title as community_title');
        $builder->where(['users_report.community_id' => $id]);
        $builder->join('users', 'users.id = users_report.reported_by_user_id');
        $builder->join('users_post', 'users_post.id = users_report.post_id');
        $builder->join('community', 'community.id = users_report.community_id');

        $query   = $builder->get();
        $data['reported_posts'] = $query->getResult();


        echo view('templates/header', $data);
        echo view('manager-community/manage-community-reported-post', $data);
        echo view('templates/footer', $data);
    }

      
    public function community_settings($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
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
        echo view('manager-community/manage-community-settings', $data);
        echo view('templates/footer', $data);
    }

    public function ip_management($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
        $data['community_id'] = $id;
        

        echo view('templates/header', $data);
        echo view('manager-community/manage-community-ip', $data);
        echo view('templates/footer', $data);
    }

    public function block_list($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
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
        echo view('manager-community/manage-community-blocklist', $data);
        echo view('templates/footer', $data);
    }

    public function block_settings(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);    
        
        $model = new UserscommunityModel();
        $community_id = $this->request->getPost('community_id');
    
        if($this->request->getPost('post') == 'on'){
            $post = '1';
        }else{
            $post = '0';
        }
        
        if($this->request->getPost('comment')){
            $comment = '1';
        }else{
            $comment = '0';
        }

        if($this->request->getPost('share')){
            $share = '1';
        }else{
            $share = '0';
        }

        if($this->request->getPost('report')){
            $report = '1';
        }else{
            $report = '0';
        }

        if($this->request->getPost('upvote_devote')){
            $upvote_devote = '1';
        }else{
            $upvote_devote = '0';
        }

        $data = [
            'id'       => $this->request->getPost('id'),
            'status' => '3',
            'post' => $post, 
            'comment' => $comment,
            'share' => $share,
            'report' => $report,
            'upvote_devote' => $upvote_devote,
        ];

        if($model->save($data)){
            $msg = 'Settings has been changed!';
            return redirect()->to( base_url().'/manage-community/block-list/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to changed!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }
    
    
    public function save_community(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
       


        // $community_photo = new CommunityphotoModel;
 
        //  $validated = $this->validate([
        //     'file' => [
        //         'uploaded[file]',
        //         'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
        //         'max_size[file,4096]',
        //     ],
        // ]);

        $rules = [
            'title' => 'required|min_length[3]|max_length[20]',
            'content' => 'required|min_length[3]|max_length[80]',
            'upvote' => 'required|min_length[3]|max_length[12]',
            'devote' => 'required|min_length[3]|max_length[12]',   
        ];

        // $msg = 'Please select a valid file';
    // if(! $this->validate($rules)){
    //     $msg = $this->validator;
    // }else{
        // if ($validated ) {
        //     $avatar = $this->request->getFile('file');
        //     $avatar->move('public/admin/uploads/community');
 
        //     $data = [
        //         'name' =>  $avatar->getClientName(),
        //         'type'  => $avatar->getClientMimeType()
        //     ];
        
            // if($community_photo->insert($data)){
                
                $model = new CommunityModel;

                // $last_id = $community_photo->insertID();
                if($this->request->getPost('community_type') == "on"){
                    $community_type = '1';
                }else{
                    $community_type = '0';
                }
        
                $community_id =$this->request->getPost('id');
          
                $newData = [
                    'id' => $this->request->getPost('id'),
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'community_type' => $community_type,
                    'color' => $this->request->getPost('color'),
                    'text_color' => $this->request->getPost('text_color'),
                    'upvote_name' => $this->request->getPost('upvote_name'),
                    'devote_name' => $this->request->getPost('devote_name')
                    ];
                
                if($model->save($newData)){

                    $msg = 'Successfully updated!';   
                }else{
                    $msg = 'Failed to update!';
                }
            // }else{
            //     $msg = 'There is an error!';
            // }

            
        // }

        // 
    // }
    return redirect()->to( base_url().'/manage-community/community-settings/'.$community_id)->with('msg', $msg);
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
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to add!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }
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

        // echo '<pre>';
        // var_dump($data);exit;

        if($model->insert($data)){
            $msg = 'Category has been added!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
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
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
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
        // echo '<pre>';
        // var_dump($data);exit;

        if($model->update($data['id'], $data)){
            $msg = 'Category has been updated!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to update!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
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
        // echo '<pre>';
        // var_dump($data);exit;

        if($model->update($data['id'], $data)){
            $msg = 'Category has been updated!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to update!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
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
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';
            return redirect()->to( base_url().'/manage-community/category/'.$community_id)->with('msg', $msg);
        }
    }


    public function accept_user($id = null, $community_id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);    
        
        $model = new UserscommunityModel();

        $data = [
            'id'       => $id,
            'status' => '1'
        ];

        if($model->save($data)){
            $msg = 'User has been accepted!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to accept!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }

    public function unblock($id = null, $community_id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);    
        
        $model = new UserscommunityModel();

        $data = [
            'id'       => $id,
            'status' => '1'
        ];

        if($model->save($data)){
            $msg = 'User has been unblock!';
            return redirect()->to( base_url().'/manage-community/block-list/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to unblock!';
            return redirect()->to( base_url().'/manage-community/block-list/'.$community_id)->with('msg', $msg);
        }
    }
    
    public function reject_user($id = null, $community_id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);
        
        $model = new UsersCommunityModel();
        $delete = $model->delete($id);

        if($delete){
            $msg = 'Category has been deleted!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }

    public function make_ac($id = null, $community_id = null){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);    
        
        $model = new UserscommunityModel();

        $data = [
            'id'       => $id,
            'status' => '2'
        ];

        if($model->save($data)){
            $msg = 'User has been accepted!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to accept!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }
    public function remove_ac(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);    

        $model = new UserscommunityModel();
        $community_id =  $this->request->getPost('community_id');
        $data = [
            'id'       => $this->request->getPost('id'),
            'status' => '1',
            'remove_ac_reason' => $this->request->getPost('remove_ac_reason')
        ];

        if($model->save($data)){
            $msg = 'User has been removed from the assistant manager!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to remove!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }
    public function ban_user(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);    

        $model = new UserscommunityModel();
        $community_id =  $this->request->getPost('community_id');
        $data = [
            'id'       => $this->request->getPost('id'),
            'status' => '3',
            'ban_reason' => $this->request->getPost('ban_reason')
        ];

        if($model->save($data)){
            $msg = 'User has been removed from the assistant manager!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to remove!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }

    public function ac_settings(){
        ini_set('display_errors', 1);
        $data = [];
        helper(['form', 'url']);   
        
        $model = new CommunityacsettingsModel();
     
        $remove_comments = $this->request->getPost('remove_comments');
        $remove_posts = $this->request->getPost('remove_posts');
        $punish_users = $this->request->getPost('punish_users');
        $remove_posts_from_hotboard = $this->request->getPost('remove_posts_from_hotboard');
        $edit_cover_photo = $this->request->getPost('edit_cover_photo');
        $edit_categories = $this->request->getPost('edit_categories');
        $edit_subclass = $this->request->getPost('edit_subclass');
        $unable_both = $this->request->getPost('unable_both');
        $notice = $this->request->getPost('notice');
        $general = $this->request->getPost('general');
        $politic = $this->request->getPost('politic');
        $community_id = $this->request->getPost('community_id');
        $user_id = $this->request->getPost('user_id');

        if($remove_comments == 'on'){
            $remove_comments = '1';
        }else{
            $remove_comments = '0';
        }
        if($remove_posts == 'on'){
            $remove_posts = '1';
        }else{
            $remove_posts = '0';
        }
        if($punish_users == 'on'){
            $punish_users = '1';
        }else{
            $punish_users = '0';
        }
        if($remove_posts_from_hotboard == 'on'){
            $remove_posts_from_hotboard = '1';
        }else{
            $remove_posts_from_hotboard = '0';
        }
        if($edit_cover_photo == 'on'){
            $edit_cover_photo = '1';
        }else{
            $edit_cover_photo = '0';
        }
        if($edit_categories == 'on'){
            $edit_categories = '1';
        }else{
            $edit_categories = '0';
        }
        if($edit_subclass == 'on'){
            $edit_subclass = '1';
        }else{
            $edit_subclass = '0';
        }
        if($unable_both == 'on'){
            $unable_both = '1';
        }else{
            $unable_both = '0';
        }
        if($notice == 'on'){
            $notice = '1';
        }else{
            $notice = '0';
        }
        if($general == 'on'){
            $general = '1';
        }else{
            $general = '0';
        }
        if($politic == 'on'){
            $politic = '1';
        }else{
            $politic = '0';
        }

        $find = $model->where('user_id', $user_id)->where('community_id', $community_id)->first();
     
        if($find == null){
            
            $data = [
                'remove_comments' => $remove_comments,
                'remove_posts' => $remove_posts,
                'punish_users' => $punish_users,
                'remove_posts_from_hotboard' => $remove_posts_from_hotboard,
                'edit_cover_photo' => $edit_cover_photo,
                'edit_categories' => $edit_categories,
                'edit_subclass' => $edit_subclass,
                'unable_both' => $unable_both,
                'notice' => $notice,
                'general' => $general,
                'politic' => $politic,
                'user_id' => $user_id,
                'community_id' => $community_id
            ];
    
            if($model->save($data)){
                $msg = 'Assistant Manager Settings has been updated!';
                return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
            }else{
                $msg = 'Failed to update!';
                return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
            }
            
        }else{
            
            $data = [
                'id' => $find['id'], 
                'remove_comments' => $remove_comments,
                'remove_posts' => $remove_posts,
                'punish_users' => $punish_users,
                'remove_posts_from_hotboard' => $remove_posts_from_hotboard,
                'edit_cover_photo' => $edit_cover_photo,
                'edit_categories' => $edit_categories,
                'edit_subclass' => $edit_subclass,
                'unable_both' => $unable_both,
                'notice' => $notice,
                'general' => $general,
                'politic' => $politic,
                'user_id' => $user_id,
                'community_id' => $community_id
            ];
    
            if($model->save($data)){
                $msg = 'Assistant Manager Settings has been updated!';
                return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
            }else{
                $msg = 'Failed to update!';
                return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
            }
        }

        

    }
    public function update_community(){
        $community = new CommunityModel();

        $data = [];

        $data = [
            'user_id' => $this->post->request('user_id'),
            'community_id' => $this->post->request('community_id'),
            'upvote_name' => $this->post->request('upvote_name'),
            'devote_name' => $this->post->request('devote_name'),
            'cover_photo' => $this->post->request('cover_photo'),
            'title' => $this->post->request('title'),
            'content' => $this->post->request('content'),
        ];

        if($remove->update($this->post->request('id'), $data)){
            $msg = 'Community has been deleted!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to remove!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }

    }

    public function community_questions(){
        ini_set('display_errors', 1);
        $community = new CommunityModel();

        $data = [];
        echo '<pre>';


        $community_id = $this->request->getPost('community_id');
        $data = [
            'id' => $this->request->getPost('community_id'),
            'questions' => $this->request->getPost('questions')
        ];

       
        if($community->update($data['id'], $data)){
            $msg = 'Community question has been save!';
            return redirect()->to( base_url().'/manage-community/community-settings/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to save!';
            return redirect()->to( base_url().'/manage-community/community-settings/'.$community_id)->with('msg', $msg);
        }



    }


    public function reset_community(){
        $community = new CommunityModel();

        if($remove->reset($this->post->request('id'))){
            $msg = 'Community has been reset!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to remove!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
    }

    public function remove_community(){

        $community = new CommunityModel();
        $get_community = $community->where('user_id', session()->get('id'))->where('id', $this->request->getPost('id'))->first();
        $data = [
            'id' => $this->request->getPost('id'),
            'status' => '1',
        ];

        if(!empty($get_community)){
            $msg = 'Community has been deleted!';
            $delete = $community->delete($data['id']);
            return redirect()->to( base_url().'/community')->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';

            return redirect()->to( base_url().'/manage-community/community-settings/'.$community_id)->with('msg', $msg);
        }


        // if($remove->delete($this->post->request('id'))){
        //     $msg = 'Community has been deleted!';
        //     return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        // }else{
        //     $msg = 'Failed to remove!';
        //     return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        // }
        
    }
}