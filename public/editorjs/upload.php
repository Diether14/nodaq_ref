<?php

// Create a blank image and add some text
$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['image']['name']);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$file = $_FILES["image"];
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$name =  basename($_FILES["image"]["name"]);
$ext = pathinfo($name, PATHINFO_EXTENSION);
$newName =  $withoutExt.'.webp';

// Create and save
if($ext == 'png'){
    $img = imagecreatefrompng( 'uploads/' . $name);
}elseif($ext == 'webp'){
    $img = imagecreatefromwebp( 'uploads/' . $name);
}elseif($ext == 'jpg' || $ext == 'jpeg'){
    $img = imagecreatefromjpeg( 'uploads/' . $name);
}else{
  $img = imagecreatefrompng( 'uploads/' . $name);  
}

$url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "/../uploads/". $newName;

// Create and save
imagepalettetotruecolor($img);
imagealphablending($img, true);
imagesavealpha($img, true);

if (imagewebp($img, 'uploads/' . $newName, 100)) {
    imagedestroy($img); 
    unlink('uploads/' . $name);
    
    $data = ['success' => 1, 
    'file' => ['url' => $url] 
    ];
    echo json_encode($data);
} else {
    imagedestroy($img); 
    unlink('uploads/' . $name);
    
    $data = ['success' => 0, 
    'file' => ['url' => $url] 
    ];
    echo json_encode($data);
}


// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["image"]["name"]);

// if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//     $data = ['success' => 1, 
//     'file' => ['url' => 'http://localhost/editor/example/uploads/'.basename($_FILES["image"]["name"])] 
//     ];

//     echo json_encode($data);
//   } else {
//     $data = ['success' => 0, 
//     'file' => ['url' => 'http://localhost/editor/example/uploads/'.basename($_FILES["image"]["name"])] 
//     ];

//     echo json_encode($data);
//   }



?>