<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunityModel extends Model{
    protected $table = 'community';
    protected $allowedFields = ['id', 'user_id', 'com_photo_id', 'title', 'content', 'community_type','updated_at'];
}

?>
