<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserspostModel extends Model{
    protected $table = 'users_post';
    protected $allowedFields = ['id', 'user_id', 'title', 'content', 'updated_at'];
}

?>
