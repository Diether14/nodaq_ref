<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunitycategoryModel extends Model{
    protected $table = 'community_category';
    protected $allowedFields = ['id', 'user_id', 'community_id', 'category_name', 'updated_at'];
}

?>
