<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmoticonstoreModel;

class Emoticonstore extends BaseController
{
    public function __construct(){
        helper('iptracker');
    }

	public function index()
	{

        ini_set('display_errors', 1);
        $data = [];
        helper(['form']);

           
        $db      = \Config\Database::connect();
        $builder = $db->table('emoticon_store');

        $builder->select('emoticon_store.id,emoticon_store.user_id, emoticon_store.title ,emoticon_store.name, emoticon_store.created_at, users.nickname ');
        $builder->join('users', 'emoticon_store.user_id = users.id');
        $query   = $builder->get();
        $data['emoticon_list'] = $query->getResult();


        echo view('templates/header', $data);
        echo view('emoticon-store', $data);
        echo view('templates/footer', $data);
    }
    
    public function add_sticker(){
        ini_set('display_errors', 1);

        helper(['form', 'url']);
   
     $db      = \Config\Database::connect();
         $builder = $db->table('emoticon_store');
        
         $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
            'title' => 'required|min_length[3]|max_length[20]'
        ]);

        $msg = 'Please select a valid file!';
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $avatar->move('public/user/uploads/stickers');
 
        
          $data = [
            'user_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
          ];
          

          if($builder->insert($data)){
            $msg = 'File has been uploaded';
          }else{
            $msg = 'There is something wrong!';
          }

    
}
    
    return redirect()->to( base_url('/emoticon-store') )->with('msg', $msg);
    }

    public function my_emoticon_store(){
      ini_set('display_errors', 1);
      $data = [];
      helper(['form']);

         
      $db      = \Config\Database::connect();
      $builder = $db->table('emoticon_store');

      $builder->select('emoticon_store.id,emoticon_store.user_id, emoticon_store.title ,emoticon_store.name, emoticon_store.created_at, users.nickname ');
      $builder->join('users', 'emoticon_store.user_id = users.id');
      $query   = $builder->get();
      $data['emoticon_list'] = $query->getResult();


      echo view('templates/header', $data);
      echo view('emoticon-store', $data);
      echo view('templates/footer', $data);
    }

    public function my_emoticon_store_list($id = null){
      ini_set('display_errors', 1);
      $data = [];
      helper(['form']);

         
      $db      = \Config\Database::connect();
      $builder = $db->table('emoticon_store');

      $builder->select('emoticon_store.id,emoticon_store.user_id, emoticon_store.title ,emoticon_store.name, emoticon_store.created_at, users.nickname ');
      $builder->where('emoticon_store.id', $id );
      $builder->join('users', 'emoticon_store.user_id = users.id');
      $query   = $builder->get();
      $data['emoticon_list'] = $query->getResult();


      echo view('templates/header', $data);
      echo view('emoticon-store-list', $data);
      echo view('templates/footer', $data);
    }


	//--------------------------------------------------------------------

}
