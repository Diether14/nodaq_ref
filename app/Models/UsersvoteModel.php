<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersvoteModel extends Model{
    protected $table = 'users_vote';
    protected $allowedFields = ['id', 'user_id', 'community_id','post_id', 'status','updated_at'];
}

?>
