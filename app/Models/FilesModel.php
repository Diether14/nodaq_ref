<?php 
namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model{
    protected $table = 'files';
    protected $allowedFields = ['id', 'p_type', 'user_id'];
}

?>
