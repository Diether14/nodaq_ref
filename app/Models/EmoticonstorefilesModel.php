<?php 
namespace App\Models;

use CodeIgniter\Model;

class EmoticonstorefilesModel extends Model{
    protected $table = 'emoticon_store_files';
    protected $allowedFields = ['id', 'user_id', 'emoticon_store_id','name', 'type', 'created_at'];
}

?>
