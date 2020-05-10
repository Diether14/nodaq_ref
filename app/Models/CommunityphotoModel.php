<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunityphotoModel extends Model{
    protected $table = 'community_photo';
    protected $allowedFields = ['id', 'name', 'updated_at'];
}

?>
