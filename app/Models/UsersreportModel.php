<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersreportModel extends Model{
    protected $table = 'users_report';
    protected $allowedFields = ['id', 'user_id', 'community_id','post_id', 'report_content', 'updated_at'];
}

?>
