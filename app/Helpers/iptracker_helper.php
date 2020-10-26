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

function getUserContinentCode($isTest = false) {
    $country_list = array(
        array('iso' => 'AF', 'country_name' => 'Afghanistan', 'continent_code' => 'AS'),
        array('iso' => 'AX', 'country_name' => 'Aland Islands', 'continent_code' => 'EU'),
        array('iso' => 'AL', 'country_name' => 'Albania', 'continent_code' => 'EU'),
        array('iso' => 'DZ', 'country_name' => 'Algeria', 'continent_code' => 'AF'),
        array('iso' => 'AS', 'country_name' => 'American Samoa', 'continent_code' => 'OC'),
        array('iso' => 'AD', 'country_name' => 'Andorra', 'continent_code' => 'EU'),
        array('iso' => 'AO', 'country_name' => 'Angola', 'continent_code' => 'AF'),
        array('iso' => 'AI', 'country_name' => 'Anguilla', 'continent_code' => 'NA'),
        array('iso' => 'AQ', 'country_name' => 'Antarctica', 'continent_code' => 'AN'),
        array('iso' => 'AG', 'country_name' => 'Antigua and Barbuda', 'continent_code' => 'NA'),
        array('iso' => 'AR', 'country_name' => 'Argentina', 'continent_code' => 'SA'),
        array('iso' => 'AM', 'country_name' => 'Armenia', 'continent_code' => 'AS'),
        array('iso' => 'AW', 'country_name' => 'Aruba', 'continent_code' => 'NA'),
        array('iso' => 'AU', 'country_name' => 'Australia', 'continent_code' => 'OC'),
        array('iso' => 'AT', 'country_name' => 'Austria', 'continent_code' => 'EU'),
        array('iso' => 'AZ', 'country_name' => 'Azerbaijan', 'continent_code' => 'AS'),
        array('iso' => 'BS', 'country_name' => 'Bahamas', 'continent_code' => 'NA'),
        array('iso' => 'BH', 'country_name' => 'Bahrain', 'continent_code' => 'AS'),
        array('iso' => 'BD', 'country_name' => 'Bangladesh', 'continent_code' => 'AS'),
        array('iso' => 'BB', 'country_name' => 'Barbados', 'continent_code' => 'NA'),
        array('iso' => 'BY', 'country_name' => 'Belarus', 'continent_code' => 'EU'),
        array('iso' => 'BE', 'country_name' => 'Belgium', 'continent_code' => 'EU'),
        array('iso' => 'BZ', 'country_name' => 'Belize', 'continent_code' => 'NA'),
        array('iso' => 'BJ', 'country_name' => 'Benin', 'continent_code' => 'AF'),
        array('iso' => 'BM', 'country_name' => 'Bermuda', 'continent_code' => 'NA'),
        array('iso' => 'BT', 'country_name' => 'Bhutan', 'continent_code' => 'AS'),
        array('iso' => 'BO', 'country_name' => 'Bolivia', 'continent_code' => 'SA'),
        array('iso' => 'BQ', 'country_name' => 'Bonaire, Sint Eustatius and Saba', 'continent_code' => 'NA'),
        array('iso' => 'BA', 'country_name' => 'Bosnia and Herzegovina', 'continent_code' => 'EU'),
        array('iso' => 'BW', 'country_name' => 'Botswana', 'continent_code' => 'AF'),
        array('iso' => 'BV', 'country_name' => 'Bouvet Island', 'continent_code' => 'AN'),
        array('iso' => 'BR', 'country_name' => 'Brazil', 'continent_code' => 'SA'),
        array('iso' => 'IO', 'country_name' => 'British Indian Ocean Territory', 'continent_code' => 'AS'),
        array('iso' => 'BN', 'country_name' => 'Brunei Darussalam', 'continent_code' => 'AS'),
        array('iso' => 'BG', 'country_name' => 'Bulgaria', 'continent_code' => 'EU'),
        array('iso' => 'BF', 'country_name' => 'Burkina Faso', 'continent_code' => 'AF'),
        array('iso' => 'BI', 'country_name' => 'Burundi', 'continent_code' => 'AF'),
        array('iso' => 'KH', 'country_name' => 'Cambodia', 'continent_code' => 'AS'),
        array('iso' => 'CM', 'country_name' => 'Cameroon', 'continent_code' => 'AF'),
        array('iso' => 'CA', 'country_name' => 'Canada', 'continent_code' => 'NA'),
        array('iso' => 'CV', 'country_name' => 'Cape Verde', 'continent_code' => 'AF'),
        array('iso' => 'KY', 'country_name' => 'Cayman Islands', 'continent_code' => 'NA'),
        array('iso' => 'CF', 'country_name' => 'Central African Republic', 'continent_code' => 'AF'),
        array('iso' => 'TD', 'country_name' => 'Chad', 'continent_code' => 'AF'),
        array('iso' => 'CL', 'country_name' => 'Chile', 'continent_code' => 'SA'),
        array('iso' => 'CN', 'country_name' => 'China', 'continent_code' => 'AS'),
        array('iso' => 'CX', 'country_name' => 'Christmas Island', 'continent_code' => 'AS'),
        array('iso' => 'CC', 'country_name' => 'Cocos (Keeling) Islands', 'continent_code' => 'AS'),
        array('iso' => 'CO', 'country_name' => 'Colombia', 'continent_code' => 'SA'),
        array('iso' => 'KM', 'country_name' => 'Comoros', 'continent_code' => 'AF'),
        array('iso' => 'CG', 'country_name' => 'Congo', 'continent_code' => 'AF'),
        array('iso' => 'CD', 'country_name' => 'Congo, the Democratic Republic of the', 'continent_code' => 'AF'),
        array('iso' => 'CK', 'country_name' => 'Cook Islands', 'continent_code' => 'OC'),
        array('iso' => 'CR', 'country_name' => 'Costa Rica', 'continent_code' => 'NA'),
        array('iso' => 'CI', 'country_name' => 'Cote D\'Ivoire', 'continent_code' => 'AF'),
        array('iso' => 'HR', 'country_name' => 'Croatia', 'continent_code' => 'EU'),
        array('iso' => 'CU', 'country_name' => 'Cuba', 'continent_code' => 'NA'),
        array('iso' => 'CW', 'country_name' => 'Curacao', 'continent_code' => 'NA'),
        array('iso' => 'CY', 'country_name' => 'Cyprus', 'continent_code' => 'AS'),
        array('iso' => 'CZ', 'country_name' => 'Czech Republic', 'continent_code' => 'EU'),
        array('iso' => 'DK', 'country_name' => 'Denmark', 'continent_code' => 'EU'),
        array('iso' => 'DJ', 'country_name' => 'Djibouti', 'continent_code' => 'AF'),
        array('iso' => 'DM', 'country_name' => 'Dominica', 'continent_code' => 'NA'),
        array('iso' => 'DO', 'country_name' => 'Dominican Republic', 'continent_code' => 'NA'),
        array('iso' => 'EC', 'country_name' => 'Ecuador', 'continent_code' => 'SA'),
        array('iso' => 'EG', 'country_name' => 'Egypt', 'continent_code' => 'AF'),
        array('iso' => 'SV', 'country_name' => 'El Salvador', 'continent_code' => 'NA'),
        array('iso' => 'GQ', 'country_name' => 'Equatorial Guinea', 'continent_code' => 'AF'),
        array('iso' => 'ER', 'country_name' => 'Eritrea', 'continent_code' => 'AF'),
        array('iso' => 'EE', 'country_name' => 'Estonia', 'continent_code' => 'EU'),
        array('iso' => 'ET', 'country_name' => 'Ethiopia', 'continent_code' => 'AF'),
        array('iso' => 'FK', 'country_name' => 'Falkland Islands (Malvinas)', 'continent_code' => 'SA'),
        array('iso' => 'FO', 'country_name' => 'Faroe Islands', 'continent_code' => 'EU'),
        array('iso' => 'FJ', 'country_name' => 'Fiji', 'continent_code' => 'OC'),
        array('iso' => 'FI', 'country_name' => 'Finland', 'continent_code' => 'EU'),
        array('iso' => 'FR', 'country_name' => 'France', 'continent_code' => 'EU'),
        array('iso' => 'GF', 'country_name' => 'French Guiana', 'continent_code' => 'SA'),
        array('iso' => 'PF', 'country_name' => 'French Polynesia', 'continent_code' => 'OC'),
        array('iso' => 'TF', 'country_name' => 'French Southern Territories', 'continent_code' => 'AN'),
        array('iso' => 'GA', 'country_name' => 'Gabon', 'continent_code' => 'AF'),
        array('iso' => 'GM', 'country_name' => 'Gambia', 'continent_code' => 'AF'),
        array('iso' => 'GE', 'country_name' => 'Georgia', 'continent_code' => 'AS'),
        array('iso' => 'DE', 'country_name' => 'Germany', 'continent_code' => 'EU'),
        array('iso' => 'GH', 'country_name' => 'Ghana', 'continent_code' => 'AF'),
        array('iso' => 'GI', 'country_name' => 'Gibraltar', 'continent_code' => 'EU'),
        array('iso' => 'GR', 'country_name' => 'Greece', 'continent_code' => 'EU'),
        array('iso' => 'GL', 'country_name' => 'Greenland', 'continent_code' => 'NA'),
        array('iso' => 'GD', 'country_name' => 'Grenada', 'continent_code' => 'NA'),
        array('iso' => 'GP', 'country_name' => 'Guadeloupe', 'continent_code' => 'NA'),
        array('iso' => 'GU', 'country_name' => 'Guam', 'continent_code' => 'OC'),
        array('iso' => 'GT', 'country_name' => 'Guatemala', 'continent_code' => 'NA'),
        array('iso' => 'GG', 'country_name' => 'Guernsey', 'continent_code' => 'EU'),
        array('iso' => 'GN', 'country_name' => 'Guinea', 'continent_code' => 'AF'),
        array('iso' => 'GW', 'country_name' => 'Guinea-Bissau', 'continent_code' => 'AF'),
        array('iso' => 'GY', 'country_name' => 'Guyana', 'continent_code' => 'SA'),
        array('iso' => 'HT', 'country_name' => 'Haiti', 'continent_code' => 'NA'),
        array('iso' => 'HM', 'country_name' => 'Heard Island and Mcdonald Islands', 'continent_code' => 'AN'),
        array('iso' => 'VA', 'country_name' => 'Holy See (Vatican City State)', 'continent_code' => 'EU'),
        array('iso' => 'HN', 'country_name' => 'Honduras', 'continent_code' => 'NA'),
        array('iso' => 'HK', 'country_name' => 'Hong Kong', 'continent_code' => 'AS'),
        array('iso' => 'HU', 'country_name' => 'Hungary', 'continent_code' => 'EU'),
        array('iso' => 'IS', 'country_name' => 'Iceland', 'continent_code' => 'EU'),
        array('iso' => 'IN', 'country_name' => 'India', 'continent_code' => 'AS'),
        array('iso' => 'ID', 'country_name' => 'Indonesia', 'continent_code' => 'AS'),
        array('iso' => 'IR', 'country_name' => 'Iran, Islamic Republic of', 'continent_code' => 'AS'),
        array('iso' => 'IQ', 'country_name' => 'Iraq', 'continent_code' => 'AS'),
        array('iso' => 'IE', 'country_name' => 'Ireland', 'continent_code' => 'EU'),
        array('iso' => 'IM', 'country_name' => 'Isle of Man', 'continent_code' => 'EU'),
        array('iso' => 'IL', 'country_name' => 'Israel', 'continent_code' => 'AS'),
        array('iso' => 'IT', 'country_name' => 'Italy', 'continent_code' => 'EU'),
        array('iso' => 'JM', 'country_name' => 'Jamaica', 'continent_code' => 'NA'),
        array('iso' => 'JP', 'country_name' => 'Japan', 'continent_code' => 'AS'),
        array('iso' => 'JE', 'country_name' => 'Jersey', 'continent_code' => 'EU'),
        array('iso' => 'JO', 'country_name' => 'Jordan', 'continent_code' => 'AS'),
        array('iso' => 'KZ', 'country_name' => 'Kazakhstan', 'continent_code' => 'AS'),
        array('iso' => 'KE', 'country_name' => 'Kenya', 'continent_code' => 'AF'),
        array('iso' => 'KI', 'country_name' => 'Kiribati', 'continent_code' => 'OC'),
        array('iso' => 'KP', 'country_name' => 'Korea, Democratic People"s Republic of', 'continent_code' => 'AS'),
        array('iso' => 'KR', 'country_name' => 'Korea, Republic of', 'continent_code' => 'AS'),
        array('iso' => 'XK', 'country_name' => 'Kosovo', 'continent_code' => 'EU'),
        array('iso' => 'KW', 'country_name' => 'Kuwait', 'continent_code' => 'AS'),
        array('iso' => 'KG', 'country_name' => 'Kyrgyzstan', 'continent_code' => 'AS'),
        array('iso' => 'LA', 'country_name' => 'Lao People\'s Democratic Republic', 'continent_code' => 'AS'),
        array('iso' => 'LV', 'country_name' => 'Latvia', 'continent_code' => 'EU'),
        array('iso' => 'LB', 'country_name' => 'Lebanon', 'continent_code' => 'AS'),
        array('iso' => 'LS', 'country_name' => 'Lesotho', 'continent_code' => 'AF'),
        array('iso' => 'LR', 'country_name' => 'Liberia', 'continent_code' => 'AF'),
        array('iso' => 'LY', 'country_name' => 'Libyan Arab Jamahiriya', 'continent_code' => 'AF'),
        array('iso' => 'LI', 'country_name' => 'Liechtenstein', 'continent_code' => 'EU'),
        array('iso' => 'LT', 'country_name' => 'Lithuania', 'continent_code' => 'EU'),
        array('iso' => 'LU', 'country_name' => 'Luxembourg', 'continent_code' => 'EU'),
        array('iso' => 'MO', 'country_name' => 'Macao', 'continent_code' => 'AS'),
        array('iso' => 'MK', 'country_name' => 'Macedonia, the Former Yugoslav Republic of', 'continent_code' => 'EU'),
        array('iso' => 'MG', 'country_name' => 'Madagascar', 'continent_code' => 'AF'),
        array('iso' => 'MW', 'country_name' => 'Malawi', 'continent_code' => 'AF'),
        array('iso' => 'MY', 'country_name' => 'Malaysia', 'continent_code' => 'AS'),
        array('iso' => 'MV', 'country_name' => 'Maldives', 'continent_code' => 'AS'),
        array('iso' => 'ML', 'country_name' => 'Mali', 'continent_code' => 'AF'),
        array('iso' => 'MT', 'country_name' => 'Malta', 'continent_code' => 'EU'),
        array('iso' => 'MH', 'country_name' => 'Marshall Islands', 'continent_code' => 'OC'),
        array('iso' => 'MQ', 'country_name' => 'Martinique', 'continent_code' => 'NA'),
        array('iso' => 'MR', 'country_name' => 'Mauritania', 'continent_code' => 'AF'),
        array('iso' => 'MU', 'country_name' => 'Mauritius', 'continent_code' => 'AF'),
        array('iso' => 'YT', 'country_name' => 'Mayotte', 'continent_code' => 'AF'),
        array('iso' => 'MX', 'country_name' => 'Mexico', 'continent_code' => 'NA'),
        array('iso' => 'FM', 'country_name' => 'Micronesia, Federated States of', 'continent_code' => 'OC'),
        array('iso' => 'MD', 'country_name' => 'Moldova, Republic of', 'continent_code' => 'EU'),
        array('iso' => 'MC', 'country_name' => 'Monaco', 'continent_code' => 'EU'),
        array('iso' => 'MN', 'country_name' => 'Mongolia', 'continent_code' => 'AS'),
        array('iso' => 'ME', 'country_name' => 'Montenegro', 'continent_code' => 'EU'),
        array('iso' => 'MS', 'country_name' => 'Montserrat', 'continent_code' => 'NA'),
        array('iso' => 'MA', 'country_name' => 'Morocco', 'continent_code' => 'AF'),
        array('iso' => 'MZ', 'country_name' => 'Mozambique', 'continent_code' => 'AF'),
        array('iso' => 'MM', 'country_name' => 'Myanmar', 'continent_code' => 'AS'),
        array('iso' => 'NA', 'country_name' => 'Namibia', 'continent_code' => 'AF'),
        array('iso' => 'NR', 'country_name' => 'Nauru', 'continent_code' => 'OC'),
        array('iso' => 'NP', 'country_name' => 'Nepal', 'continent_code' => 'AS'),
        array('iso' => 'NL', 'country_name' => 'Netherlands', 'continent_code' => 'EU'),
        array('iso' => 'AN', 'country_name' => 'Netherlands Antilles', 'continent_code' => 'NA'),
        array('iso' => 'NC', 'country_name' => 'New Caledonia', 'continent_code' => 'OC'),
        array('iso' => 'NZ', 'country_name' => 'New Zealand', 'continent_code' => 'OC'),
        array('iso' => 'NI', 'country_name' => 'Nicaragua', 'continent_code' => 'NA'),
        array('iso' => 'NE', 'country_name' => 'Niger', 'continent_code' => 'AF'),
        array('iso' => 'NG', 'country_name' => 'Nigeria', 'continent_code' => 'AF'),
        array('iso' => 'NU', 'country_name' => 'Niue', 'continent_code' => 'OC'),
        array('iso' => 'NF', 'country_name' => 'Norfolk Island', 'continent_code' => 'OC'),
        array('iso' => 'MP', 'country_name' => 'Northern Mariana Islands', 'continent_code' => 'OC'),
        array('iso' => 'NO', 'country_name' => 'Norway', 'continent_code' => 'EU'),
        array('iso' => 'OM', 'country_name' => 'Oman', 'continent_code' => 'AS'),
        array('iso' => 'PK', 'country_name' => 'Pakistan', 'continent_code' => 'AS'),
        array('iso' => 'PW', 'country_name' => 'Palau', 'continent_code' => 'OC'),
        array('iso' => 'PS', 'country_name' => 'Palestinian Territory, Occupied', 'continent_code' => 'AS'),
        array('iso' => 'PA', 'country_name' => 'Panama', 'continent_code' => 'NA'),
        array('iso' => 'PG', 'country_name' => 'Papua New Guinea', 'continent_code' => 'OC'),
        array('iso' => 'PY', 'country_name' => 'Paraguay', 'continent_code' => 'SA'),
        array('iso' => 'PE', 'country_name' => 'Peru', 'continent_code' => 'SA'),
        array('iso' => 'PH', 'country_name' => 'Philippines', 'continent_code' => 'AS'),
        array('iso' => 'PN', 'country_name' => 'Pitcairn', 'continent_code' => 'OC'),
        array('iso' => 'PL', 'country_name' => 'Poland', 'continent_code' => 'EU'),
        array('iso' => 'PT', 'country_name' => 'Portugal', 'continent_code' => 'EU'),
        array('iso' => 'PR', 'country_name' => 'Puerto Rico', 'continent_code' => 'NA'),
        array('iso' => 'QA', 'country_name' => 'Qatar', 'continent_code' => 'AS'),
        array('iso' => 'RE', 'country_name' => 'Reunion', 'continent_code' => 'AF'),
        array('iso' => 'RO', 'country_name' => 'Romania', 'continent_code' => 'EU'),
        array('iso' => 'RU', 'country_name' => 'Russian Federation', 'continent_code' => 'AS'),
        array('iso' => 'RW', 'country_name' => 'Rwanda', 'continent_code' => 'AF'),
        array('iso' => 'BL', 'country_name' => 'Saint Barthelemy', 'continent_code' => 'NA'),
        array('iso' => 'SH', 'country_name' => 'Saint Helena', 'continent_code' => 'AF'),
        array('iso' => 'KN', 'country_name' => 'Saint Kitts and Nevis', 'continent_code' => 'NA'),
        array('iso' => 'LC', 'country_name' => 'Saint Lucia', 'continent_code' => 'NA'),
        array('iso' => 'MF', 'country_name' => 'Saint Martin', 'continent_code' => 'NA'),
        array('iso' => 'PM', 'country_name' => 'Saint Pierre and Miquelon', 'continent_code' => 'NA'),
        array('iso' => 'VC', 'country_name' => 'Saint Vincent and the Grenadines', 'continent_code' => 'NA'),
        array('iso' => 'WS', 'country_name' => 'Samoa', 'continent_code' => 'OC'),
        array('iso' => 'SM', 'country_name' => 'San Marino', 'continent_code' => 'EU'),
        array('iso' => 'ST', 'country_name' => 'Sao Tome and Principe', 'continent_code' => 'AF'),
        array('iso' => 'SA', 'country_name' => 'Saudi Arabia', 'continent_code' => 'AS'),
        array('iso' => 'SN', 'country_name' => 'Senegal', 'continent_code' => 'AF'),
        array('iso' => 'RS', 'country_name' => 'Serbia', 'continent_code' => 'EU'),
        array('iso' => 'CS', 'country_name' => 'Serbia and Montenegro', 'continent_code' => 'EU'),
        array('iso' => 'SC', 'country_name' => 'Seychelles', 'continent_code' => 'AF'),
        array('iso' => 'SL', 'country_name' => 'Sierra Leone', 'continent_code' => 'AF'),
        array('iso' => 'SG', 'country_name' => 'Singapore', 'continent_code' => 'AS'),
        array('iso' => 'SX', 'country_name' => 'Sint Maarten', 'continent_code' => 'NA'),
        array('iso' => 'SK', 'country_name' => 'Slovakia', 'continent_code' => 'EU'),
        array('iso' => 'SI', 'country_name' => 'Slovenia', 'continent_code' => 'EU'),
        array('iso' => 'SB', 'country_name' => 'Solomon Islands', 'continent_code' => 'OC'),
        array('iso' => 'SO', 'country_name' => 'Somalia', 'continent_code' => 'AF'),
        array('iso' => 'ZA', 'country_name' => 'South Africa', 'continent_code' => 'AF'),
        array('iso' => 'GS', 'country_name' => 'South Georgia and the South Sandwich Islands', 'continent_code' => 'AN'),
        array('iso' => 'SS', 'country_name' => 'South Sudan', 'continent_code' => 'AF'),
        array('iso' => 'ES', 'country_name' => 'Spain', 'continent_code' => 'EU'),
        array('iso' => 'LK', 'country_name' => 'Sri Lanka', 'continent_code' => 'AS'),
        array('iso' => 'SD', 'country_name' => 'Sudan', 'continent_code' => 'AF'),
        array('iso' => 'SR', 'country_name' => 'Suriname', 'continent_code' => 'SA'),
        array('iso' => 'SJ', 'country_name' => 'Svalbard and Jan Mayen', 'continent_code' => 'EU'),
        array('iso' => 'SZ', 'country_name' => 'Swaziland', 'continent_code' => 'AF'),
        array('iso' => 'SE', 'country_name' => 'Sweden', 'continent_code' => 'EU'),
        array('iso' => 'CH', 'country_name' => 'Switzerland', 'continent_code' => 'EU'),
        array('iso' => 'SY', 'country_name' => 'Syrian Arab Republic', 'continent_code' => 'AS'),
        array('iso' => 'TW', 'country_name' => 'Taiwan, Province of China', 'continent_code' => 'AS'),
        array('iso' => 'TJ', 'country_name' => 'Tajikistan', 'continent_code' => 'AS'),
        array('iso' => 'TZ', 'country_name' => 'Tanzania, United Republic of', 'continent_code' => 'AF'),
        array('iso' => 'TH', 'country_name' => 'Thailand', 'continent_code' => 'AS'),
        array('iso' => 'TL', 'country_name' => 'Timor-Leste', 'continent_code' => 'AS'),
        array('iso' => 'TG', 'country_name' => 'Togo', 'continent_code' => 'AF'),
        array('iso' => 'TK', 'country_name' => 'Tokelau', 'continent_code' => 'OC'),
        array('iso' => 'TO', 'country_name' => 'Tonga', 'continent_code' => 'OC'),
        array('iso' => 'TT', 'country_name' => 'Trinidad and Tobago', 'continent_code' => 'NA'),
        array('iso' => 'TN', 'country_name' => 'Tunisia', 'continent_code' => 'AF'),
        array('iso' => 'TR', 'country_name' => 'Turkey', 'continent_code' => 'AS'),
        array('iso' => 'TM', 'country_name' => 'Turkmenistan', 'continent_code' => 'AS'),
        array('iso' => 'TC', 'country_name' => 'Turks and Caicos Islands', 'continent_code' => 'NA'),
        array('iso' => 'TV', 'country_name' => 'Tuvalu', 'continent_code' => 'OC'),
        array('iso' => 'UG', 'country_name' => 'Uganda', 'continent_code' => 'AF'),
        array('iso' => 'UA', 'country_name' => 'Ukraine', 'continent_code' => 'EU'),
        array('iso' => 'AE', 'country_name' => 'United Arab Emirates', 'continent_code' => 'AS'),
        array('iso' => 'GB', 'country_name' => 'United Kingdom', 'continent_code' => 'EU'),
        array('iso' => 'US', 'country_name' => 'United States', 'continent_code' => 'NA'),
        array('iso' => 'UM', 'country_name' => 'United States Minor Outlying Islands', 'continent_code' => 'NA'),
        array('iso' => 'UY', 'country_name' => 'Uruguay', 'continent_code' => 'SA'),
        array('iso' => 'UZ', 'country_name' => 'Uzbekistan', 'continent_code' => 'AS'),
        array('iso' => 'VU', 'country_name' => 'Vanuatu', 'continent_code' => 'OC'),
        array('iso' => 'VE', 'country_name' => 'Venezuela', 'continent_code' => 'SA'),
        array('iso' => 'VN', 'country_name' => 'Viet Nam', 'continent_code' => 'AS'),
        array('iso' => 'VG', 'country_name' => 'Virgin Islands, British', 'continent_code' => 'NA'),
        array('iso' => 'VI', 'country_name' => 'Virgin Islands, U.s.', 'continent_code' => 'NA'),
        array('iso' => 'WF', 'country_name' => 'Wallis and Futuna', 'continent_code' => 'OC'),
        array('iso' => 'EH', 'country_name' => 'Western Sahara', 'continent_code' => 'AF'),
        array('iso' => 'YE', 'country_name' => 'Yemen', 'continent_code' => 'AS'),
        array('iso' => 'ZM', 'country_name' => 'Zambia', 'continent_code' => 'AF'),
        array('iso' => 'ZW', 'country_name' => 'Zimbabwe', 'continent_code' => 'AF')
     );
    if($isTest){
        return 'EU';
    }
    $country_code = $_SERVER["HTTP_CF_IPCOUNTRY"] ?: 'PH';
    $key = array_search($country_code, array_column($country_list, 'iso'));
    if($key) {
        return $country_list[$key]['continent_code'];
    }else {
        return $country_code;
    }
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
