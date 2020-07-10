<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserscommunityModel extends Model{
    protected $table = 'users_community';
    protected $allowedFields = ['id', 'user_id', 'status','community_id', 'updated_at'];
}

?>
