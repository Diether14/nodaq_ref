<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunitybannedusersModel extends Model{
    protected $table = 'community_banned_users';
    protected $allowedFields = ['id', 'user_id', 'community_id', 'reason', 'updated_at'];
}

?>
