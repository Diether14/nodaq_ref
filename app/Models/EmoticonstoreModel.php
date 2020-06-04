<?php 
namespace App\Models;

use CodeIgniter\Model;

class EmoticonstoreModel extends Model{
    protected $table = 'emoticon_store';
    protected $allowedFields = ['id', 'user_id', 'name', 'type', 'updated_at'];
}

?>
