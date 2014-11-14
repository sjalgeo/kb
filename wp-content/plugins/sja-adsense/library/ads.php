<?php

function sjaGetAdBySize($size)
{
    $ad_path = SJA_ADS_PATH.$size.'.html';

    if (!file_exists($ad_path)) return false;

    return file_get_contents($ad_path);
}

function sjaGetTemplate($align='center')
{
    $template_path = SJA_ADS_TEMPLATES.'ad-'.$align.'.html';

    if (!file_exists($template_path)) return '';

    return file_get_contents($template_path);
}

function sjaGetScript()
{
    $template_path = SJA_ADS_TEMPLATES.'script.html';
    if (!file_exists($template_path)) return '';
    return file_get_contents($template_path);
}