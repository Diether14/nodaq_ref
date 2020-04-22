<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
        // ini_set('display_errors', 1);

        $data = [];
        helper(['form']);

        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer', $data);

    }
    
    public function login(){
        // if ($this->request->getMethod() == 'post') {
        // }
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'Email or Password don\'t match'
            ]
        ];
        
        if (! $this->validate($rules, $errors)) {
            $data['validation'] = $this->validator;
            return redirect()->to('weendigo/');
        }else{
            $model = new UserModel();

            $user = $model->where('email', $this->request->getVar('email'))
                          ->first();

            $this->setUserSession($user);

            return redirect()->to('/weendigo/dashboard');

        }
    }

    
    private function setUserSession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function test(){
        var_dump('test');exit;
    }

    public function register(){
        // ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            
            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password')
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/weendigo');
            
            }
        }


        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer', $data);
    }

    public function profile(){
        ini_set('display_errors', 1);

        
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
            ];
            
            if($this->request->getPost('password') != ''){
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
                
            }

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{

                $newData = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                ];

                if($this->request->getPost('password') != ''){
                    $newData['password'] = $this->request->getPost('password');
                }

                $model->save($newData);
                // $session = session();
                session()->setFlashdata('success', 'Successful Updated');
                return redirect()->to('/weendigo/profile');
            
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/weendigo');
    }

	//--------------------------------------------------------------------

}
