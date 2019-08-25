<?php

function photos_path() {
    $photos_path = public_path('/img/products/'. date("Y/m") .'/');

    if( ! File::exists($photos_path))
        File::makeDirectory($photos_path, 0777, true);

    return $photos_path;
}