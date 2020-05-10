<?php 
namespace App\Models;

use CodeIgniter\Model;

class CoverphotoModel extends Model{
    protected $table = 'cover_photo';
    protected $allowedFields = ['id', 'user_id', 'name'];
}

?>
