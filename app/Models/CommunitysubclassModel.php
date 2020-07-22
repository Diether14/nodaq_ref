<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunitysubclassModel extends Model{
    protected $table = 'community_category_subclass';
    protected $allowedFields = ['id', 'category_id','user_id', 'community_id', 'subclass', 'updated_at'];
}

?>
