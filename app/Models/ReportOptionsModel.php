<?php 
namespace App\Models;

use CodeIgniter\Model;

class ReportOptionsModel extends Model{
    protected $table = 'report_options';
    protected $allowedFields = ['id', 'user_id', 'content', 'updated_at'];
}

?>
