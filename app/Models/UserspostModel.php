<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserspostModel extends Model{
    protected $table = 'users_post';
    protected $allowedFields = ['id', 'user_id', 'community_id','title','description', 'content','status', 'reason', 'tags', 'category_id', 'subclass_id','updated_at'];
}

?>
