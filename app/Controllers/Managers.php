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

        // $db      = \Config\Database::connect();
        // $builder = $db->table('users_community');
        // $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous, users_community.assistant_manager, users.nickname, users.email');
        // $builder->where(['users_community.community_id' => $id, 'users_community.assistant_manager' => 1]);
        // $builder->join('users', 'users_community.user_id = users.id');
        // $query   = $builder->get();
        // $data['users_community'] = $query->getResult();

        $db      = \Config\Database::connect();
        $builder = $db->table('users_community');
        $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous, users_community.assistant_manager, users.nickname, users.email');
        $builder->where(['users_community.community_id' => $id]);
        $builder->join('users', 'users_community.user_id = users.id');
        $query   = $builder->get();
        $data['users'] = $query->getResult();

        // $db      = \Config\Database::connect();
        // $builder = $db->table('users_community');
        // $builder->select('users_community.id, users_community.user_id, users_community.community_id, users_community.status, users_community.anounymous, users_community.assistant_manager, users.nickname, users.email');
        // $builder->where(['users_community.community_id' => $id, 'users_community.assistant_manager' => 0, 'users_community.status' => 0]);
        // $builder->join('users', 'users_community.user_id = users.id');
        // $query   = $builder->get();
        // $data['pending_users'] = $query->getResult();

        echo view('templates/header', $data);
        echo view('manager-community/manage-community-users', $data);
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
}