<?php 
namespace App\Models;

use CodeIgniter\Model;

class JoincommunityfilesModel extends Model{
    protected $table = 'join_community_files';
    protected $allowedFields = ['id', 'user_id', 'community','name', 'type', 'created_at'];
}

?>
