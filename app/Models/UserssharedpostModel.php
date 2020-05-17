<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserssharedpostModel extends Model{
    protected $table = 'users_shared_posts';
    protected $allowedFields = ['id', 'user_id', 'community_id','post_id', 'content', 'updated_at'];
}

?>
