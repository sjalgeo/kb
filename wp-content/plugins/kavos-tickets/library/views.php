<?php

function getView($filename)
{
    $path = KBTICKETS_VIEWS.$filename;

    return file_exists($path) ? file_get_contents($path) : false;
}

function getElement($filename)
{
    $path = KBTICKETS_VIEWS.'elements/'.$filename;

    return file_exists($path) ? file_get_contents($path) : false;
}

function loadView($view, $data)
{
    foreach($data as $key => $value)
    {
        $key = '{'.$key.'}';
        $view = str_replace($key, $value, $view);
    }

    return $view;
}

function outputBrandPage($post)
{
    $brand_id = get_post_meta($post->ID, 'brand_id', false);
    $brand_id = $brand_id[0];

    $brand = new Brand($brand_id);
    echo createBrandPage($brand);
}