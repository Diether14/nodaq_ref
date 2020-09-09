<?php 
namespace App\Models;

use CodeIgniter\Model;

class PostcommentrepliesModel extends Model{
    protected $table = 'post_comment_replies';
    protected $allowedFields = ['user_id', 'post_id', 'comment_id', 'comment'];
}

?>
