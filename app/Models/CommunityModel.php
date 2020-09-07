<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunityModel extends Model{
    protected $table = 'community';
    protected $allowedFields = ['id', 'user_id', 'com_photo_id', 'title', 'content', 'community_type', 'color', 'text_color', 'upvote_name', 'devote_name', 'questions', 'status', 'slug' , 'updated_at'];
}

?>
