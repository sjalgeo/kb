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