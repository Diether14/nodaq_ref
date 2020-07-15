<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommunityacsettingsModel extends Model{
    protected $table = 'community_ac_settings';
    protected $allowedFields = ['id', 'user_id', 'community_id', 'manager_id', 'remove_comments','remove_posts','punish_users','remove_posts_from_hotboard','edit_cover_photo', 'edit_categories', 'edit_subclass', 'unable_both', 'notice', 'general', 'politic', 'updated_at'];
}

?>
