<?php

$dir = __DIR__;
// $dir = '\opt\lampp\htdocs\teachers-toolkit-app\client\partials';

// windows __DIR__ has \
if (str_contains($dir, '\\')) {
  $dir = str_replace('\\', '/', $dir);
}
$rel_dir = explode($_SERVER['DOCUMENT_ROOT'], $dir)[1];
$temp = explode('/', $rel_dir);
array_pop($temp);
$path = implode('/', $temp);
echo $path;