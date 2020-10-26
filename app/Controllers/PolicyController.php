<?php 

namespace App\Controllers;

class PolicyController extends BaseController
{

    public function __construct() {
    }

    public function index()
    {
        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        echo view('templates/header', $this->page_links);
        echo view('dashboard', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }

    public function disclaimerForIntelectualProperty() {
        echo view('templates/header', $this->page_links);
        echo view('policies/disclaimer-for-intelectual-property', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }
    public function termsAndConditions() {
        echo view('templates/header', $this->page_links);
        echo view('policies/terms-and-conditions', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }
    public function gdprPrivacyNotice() {
        echo view('templates/header', $this->page_links);
        echo view('policies/gdpr-privacy-notice', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }
    public function privacyPolicy() {
        echo view('templates/header', $this->page_links);
        echo view('policies/privacy-policy', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }
    public function cookiePolicy() {
        echo view('templates/header', $this->page_links);
        echo view('policies/cookie-policy', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }
    public function ccpaForNodaq() {
        echo view('templates/header', $this->page_links);
        echo view('policies/ccpa-for-nodaq', $this->page_links);
        echo view('templates/footer', $this->page_links);
    }
}






?>