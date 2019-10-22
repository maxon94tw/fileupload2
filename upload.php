<?php

if(!$_FILES)
    return;
else
    uploadFile();

function uploadFile() {
    $target_dir = __DIR__ . "/";
    $file = $_FILES["file"];
    $newFileName = nameToMd5($file['name']);

    move_uploaded_file($file['tmp_name'], $target_dir . $newFileName);

    if ($target_dir . $file['name']) {
        echo "File uploaded successfully";
    } else {
        echo "Whoops";
    }
}

function nameToMd5($fileName) {
    $name = explode('.', $fileName)[0];
    $ext = explode('.', $fileName)[1];

    $name = substr(md5($name . rand(0, 10000)), 0, 6);

    return $name . '.' . $ext;
}