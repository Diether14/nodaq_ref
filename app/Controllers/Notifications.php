<?php 

namespace App\Controllers;

use App\Models\NotificationsModel;

class Notifications extends BaseController{

    // these functions are only used for back end


    /* 
        SELECT function 
        $type   -   what type of user will the notification be
            a   -   all
            aa  -   announcement
            sb  -   subscription
            rr  -   report
            ul  -   user login/logout
            cc  -   community
            vt  -   voting
        $uid    -   who will be receiving the notifications
            a   -   all
            am  -   admin
            uc  -   users in the community
            ua  -   all users
            us  -   users, subscribed
    */
    public function selectNotifications($type, $uid){
        
            ini_set('display_errors', 1);
            $db = \Config\Database::connect();
            $builder = $db->table('notifications');
            // $builder->where(['type' => $type, 'receiver_id' => $uid]);
            // $builder->orderBy('dateAdded', 'desc');
            $query = $builder->get();
            echo json_encode(array(
                "status"    =>  1,
                "data"  =>  $query->getResult())
            );
            exit;
            
    }
    
    public function add(){
        ini_set('display_errors', 1);
        helper(['form']);
        $data = $this->request->getPost('notificationData');
        var_dump($data);
    }


}






<<<<<<< HEAD
=======







>>>>>>> master
?>