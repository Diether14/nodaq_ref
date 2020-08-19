<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $data = ['success' => 1, 
    'file' => ['url' => 'http://localhost/editor/example/uploads/'.basename($_FILES["image"]["name"])] 
    ];

    echo json_encode($data);
  } else {
    $data = ['success' => 0, 
    'file' => ['url' => 'http://localhost/editor/example/uploads/'.basename($_FILES["image"]["name"])] 
    ];

    echo json_encode($data);
  }


    

?>