<?php 
namespace App\Models;

use CodeIgniter\Model;

class NotificationsModel extends Model{
    protected $table = 'notifications';
    protected $allowedFields = ['sender_id', 'receiver_id', 'type', 'content','isGlobal','isFromAdministration'];
}

?>
