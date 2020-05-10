<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersCheck implements FilterInterface{
    public function before(RequestInterface $request){
        // var_dump('test');
        $uri = service('uri');
        if($uri->getSegment(1) == 'users'){
            if($uri->getSegment(2) == '')
                $segment = '/weendi';
            else
                $segment = '/weendi'.$uri->getSegment(2);
        
            return redirect()->to($segment);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response){

    }
}

?>