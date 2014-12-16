<?php

function createBrandPage($brand)
{
    $data = array();
    $view = getView('brand.html');


    # Ticket Types
    $data['BUY_OPTIONS'] = kbGetProductOptions($brand);
    $data['BUTTONS'] = getElement('buttons.html');
    $data['SCRIPT'] = getElement('script.html');

    # Load Parameters
    $data['BRAND_ID'] = $brand->getId();
    $data['BRAND_TITLE'] = $brand->getName();
    $data['BRAND_IMAGE'] = $brand->getImage();
    $data['BRAND_DESCRIPTION'] = $brand->getDescription();
    $data['BRAND_FROM_PRICE'] = $brand->getDefaultprice();

    return loadView($view, $data);
}