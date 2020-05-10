<?php 
// if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
**********************************************************************/

function any_in_array($needle, $haystack)
{
    $needle = is_array($needle) ? $needle : [$needle];

    foreach ($needle as $item)
    {
        if (in_array($item, $haystack))
        {
            return TRUE;
        }
        }

    return FALSE;
}

// random_element() is included in Array Helper, so it overrides the native function
function test($data)
{
    echo '<pre>';
	var_dump($data);
	echo '</pre>';
	exit;
}

function get_ip_address(){		
	
	$ip = getenv('HTTP_CLIENT_IP')?:
		getenv('HTTP_X_FORWARDED_FOR')?:
		getenv('HTTP_X_FORWARDED')?:
		getenv('HTTP_FORWARDED_FOR')?:
		getenv('HTTP_FORWARDED')?:
		getenv('REMOTE_ADDR');		
	return $ip;
}
	
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function get_page_visit(){
	return current_url();
}
	
function flatten(array $array) {
	$return = array();
	array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
	return $return;
}

    // function get_user_agent(){        
	// 	$sys = null;
    //     if ($this->sys->agent->is_browser()){
    //         $agent = $this->sys->agent->browser().' '.$this->sys->agent->version();
    //     }
    //     elseif ($this->sys->agent->is_robot()){
    //         $agent = $this->sys->agent->robot();
    //     }
    //     elseif ($this->sys->agent->is_mobile()){
    //         $agent = $this->sys->agent->mobile();
    //     }
    //     else{
    //         $agent = 'Unidentified User Agent';
    //     }

    //     return $agent;
    // }
	
	// function save_site_visit(){
	// 	$ip 	= get_ip_address();
	// 	$page	= get_page_visit();
    //     $agent  = get_user_agent();
	// 	$seg    = explode("-", $page);
		
    //     //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
	// 	//if(!in_array('admin', $seg)){			
	// 		$data = array(
	// 			'ip'            => $ip,
	// 			'page_view'     => $page,
    //             'user_agent'    => $agent,
	// 			'date'          => time()
	// 		);
			
	// 		$this->sys->db->insert('site_visits', $data);			
	// 	//}
	// }
// }

// $tracker = new Iptracker();
// $tracker->save_site_visit();
