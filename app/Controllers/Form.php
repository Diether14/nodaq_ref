<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Form extends Controller
{
    public function index()
    {    
         return view('form');
    }
    public function test(){
        
        echo 'test';
    }
 
   public function store()
   {  
 
     helper(['form', 'url']);
         
     $db      = \Config\Database::connect();
         $builder = $db->table('files');
 
        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid file';
  
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $avatar->move(WRITEPATH . 'uploads');
 
          $data = [
 
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
          ];
 
          $save = $builder->insert($data);
          $msg = 'File has been uploaded';
        }
       return redirect()->to( base_url().'/form' )->with('msg', $msg);
 
    }
}