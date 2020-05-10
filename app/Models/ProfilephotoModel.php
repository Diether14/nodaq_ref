<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProfilephotoModel extends Model{
    protected $table = 'profile_photo';
    protected $allowedFields = ['id', 'user_id', 'name'];
}

?>
