<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);


		$this->page_links = [
            'disclaimerForIntelectualProperty'  => '/disclaimer-for-intelectual-property',
            'termsAndConditions'                => '/terms-and-conditions',
            'gdprPrivacyNotice'                 => '/gdpr-privacy-notice',
            'privacyNotice'                     => '/privacy-notice',
            'cookiePolicy'                      => '/cookie-policy',
            'customerSupport'                   => '/customer-support',
            'ccpaForNodaq'                      => '/ccpa-for-nodaq',
        ];

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		helper('iptracker');
		// for testing purposes only. remove param on getUserContinentCode on line 60
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
		{
			if(!isset($_COOKIE['cookie-consent'])){
				$continentCode = getUserContinentCode();
				if($continentCode == 'EU'){
					echo view('cookie-consent', $this->page_links);
				}

			}
		}
	}

}
