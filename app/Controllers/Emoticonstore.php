<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmoticonstoreModel;
use App\Models\EmoticonstorefilesModel;

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


      $db      = \Config\Database::connect();
      $builder = $db->table('emoticon_store_files');

      $builder->select('emoticon_store_files.id,emoticon_store_files.user_id, emoticon_store_files.emoticon_store_id ,emoticon_store_files.name, emoticon_store_files.created_at');
      $builder->where('emoticon_store_files.emoticon_store_id', $id );
      $builder->join('users', 'emoticon_store_files.user_id = users.id');
      $query   = $builder->get();
      $data['emoticon_package'] = $query->getResult();

      $data['id'] = $id;
      echo view('templates/header', $data);
      echo view('emoticon-store-list', $data);
      echo view('templates/footer', $data);
    }

    public function add_multiple_sticker(){
      ini_set('display_errors', 1);
 
      helper(['form', 'url']);
 
      $db      = \Config\Database::connect();
      $builder = $db->table('emoticon_store_files');

      $msg = 'Please select a valid files';

      if ($this->request->getFileMultiple('file')) {
    
           foreach($this->request->getFileMultiple('file') as $file)
           {   

              $file->move('public/user/uploads/stickers/pack');

            $data = [
              'user_id' => session()->get('id'),
              'emoticon_store_id' =>  $this->request->getPost('emoticon_store_id'),
              'name' =>  $file->getClientName(),
              'type'  => $file->getClientMimeType()
            ];

            $save = $builder->insert($data);
           }
           $msg = 'Files has been uploaded';
           return redirect()->to( base_url('/emoticon-store-list/'. $this->request->getPost('emoticon_store_id')) )->with('msg', $msg);
      }
  }

  public function delete_single_sticker($id = null, $store_id = null){
    ini_set('display_errors', 1);
 
    helper(['form', 'url']);

    $model = new EmoticonstorefilesModel();

    $delete = $model->delete($id);
    if($delete){
      $msg = 'The File has been deleted!';
      return redirect()->to( base_url('/emoticon-store-list/'. $store_id) )->with('msg', $msg);
    }else{
      $msg = 'Failed to delete';
      return redirect()->to( base_url('/emoticon-store-list/'. $store_id) )->with('msg', $msg);
    }

  }

  public function update_sticker(){
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
            'title' => 'required|min_length[3]|max_length[50]'
        ]);

        $msg = 'Please select a valid file!';
        if ($validated) {
            $avatar = $this->request->getFile('file');
            $avatar->move('public/user/uploads/stickers');
            
            $id = $this->request->getPost('id'); 
        
          $data = [
          
            'title' => $this->request->getPost('title'),
            'name' =>  $avatar->getClientName(),
            'type'  => $avatar->getClientMimeType()
          ];
          
          $builder->where('id', $id);
          $update = $builder->update($data);
          if($update){
            $msg = 'Sticker Bundle has been updated';
          }else{
            $msg = 'Failed to update!';
          }
    

  }
  return redirect()->to( base_url('/emoticon-store') )->with('msg', $msg);
}

	//--------------------------------------------------------------------

}
