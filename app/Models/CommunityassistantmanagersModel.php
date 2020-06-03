<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunityassistantmanagersModel extends Model{
    protected $table = 'community_assistant_managers';
    protected $allowedFields = ['id', 'user_id', 'community_id', 'manager_id', 'updated_at'];
}

?>
