<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserscommunityModel extends Model{
    protected $table = 'users_community';
    protected $allowedFields = ['id', 'user_id', 'status','community_id', 'anounymous', 'ban_reason','remove_ac_reason', 'post', 'comment', 'share', 'report', 'upvote_devote','updated_at'];
}

?>
