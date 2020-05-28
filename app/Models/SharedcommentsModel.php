<?php 
namespace App\Models;

use CodeIgniter\Model;

class SharedcommentsModel extends Model{
    protected $table = 'shared_comments';
    protected $allowedFields = ['id', 'user_id', 'post_id', 'content', 'updated_at'];
}

?>
