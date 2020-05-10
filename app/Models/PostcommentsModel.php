<?php 
namespace App\Models;

use CodeIgniter\Model;

class PostcommentsModel extends Model{
    protected $table = 'post_comments';
    protected $allowedFields = ['id', 'user_id', 'post_id', 'content', 'updated_at'];
}

?>
