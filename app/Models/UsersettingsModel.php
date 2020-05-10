<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersettingsModel extends Model{
    protected $table = 'user_settings';
    protected $allowedFields = ['id', 'user_id', 'user_mode', 'user_nickname', 'updated_at'];
}

?>
