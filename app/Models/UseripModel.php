<?php 
namespace App\Models;

use CodeIgniter\Model;

class UseripModel extends Model{
    protected $table = 'users_ip';
    protected $allowedFields = ['id', 'user_id', 'ip', 'updated_at'];
}

?>
