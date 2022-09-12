<?php

// $dir = __DIR__;
// $dir = 'G:\xampp\htdocs\teachers-toolkit-app\client\partials';

// windows __DIR__ has \
if (str_contains($dir, '\\')) {
  $dir = str_replace('\\', '/', $dir);
}

$rel_dir = explode($_SERVER['DOCUMENT_ROOT'], __DIR__)[1];
$temp = explode('/', $rel_dir);
array_pop($temp);
$path = implode('/', $temp);
echo $path;