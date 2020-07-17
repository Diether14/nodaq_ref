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

class Managers extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }

    public function dashboard($id = null){
        helper(['form']);

        ini_set('display_errors', 1);
        $data['community_id'] = $id;
    
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

        $model = new CommunitycategoryModel;
        $data['community_category'] = $model->where(['user_id' => session()->get('id'), 'community_id' => $id])->find();

        echo view('templates/header', $data);
        echo view('manager-community/manage-community-category', $data);
        echo view('templates/footer', $data);
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
        $builder->select('*');
        $builder->where(['users_report.community_id' => $id]);
        
        $query   = $builder->get();
        $data['reported_posts'] = $query->getResult();
        // echo '<pre>';
        // var_dump($data['reported_posts']);exit;

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

        echo view('templates/header', $data);
        echo view('manager-community/manage-community-settings', $data);
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

        // echo '<pre>';
        // var_dump($data);exit;

        if($model->insert($data)){
            $msg = 'Category has been added!';
            return redirect()->to( base_url().'/manage-community/'.$community_id)->with('msg', $msg);
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
            return redirect()->to( base_url().'/manage-community/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to delete!';
            return redirect()->to( base_url().'/manage-community/'.$community_id)->with('msg', $msg);
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
            return redirect()->to( base_url().'/manage-community/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to update!';
            return redirect()->to( base_url().'/manage-community/'.$community_id)->with('msg', $msg);
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

        if($remove->delete($this->post->request('id'))){
            $msg = 'Community has been deleted!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }else{
            $msg = 'Failed to remove!';
            return redirect()->to( base_url().'/manage-community/users/'.$community_id)->with('msg', $msg);
        }
        
    }
}