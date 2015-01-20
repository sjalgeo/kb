<?php

function createBrandPage($brand)
{
    $data = array();
    $view = getView('elements/brand/main.html');

    # Ticket Types
    $data['KB_RIGHT'] = $brand->getEnabled() ? getView('elements/brand/available.html') : $brand->getOffsaleMessage();
    $data['BUY_OPTIONS'] = kbGetProductOptions($brand);
    $data['BUTTONS'] = getElement('buttons.html');
    $data['SCRIPT'] = getElement('script.html');

    # Load Parameters
    $data['BRAND_ID'] = $brand->getId();
    $data['BRAND_TITLE'] = $brand->getName();
    $data['BRAND_IMAGE'] = $brand->getImage();
    $data['BRAND_DESCRIPTION'] = $brand->getDescription();
    $data['BRAND_FROM_PRICE'] = $brand->getDefaultprice(true);

    return loadView($view, $data);
}

function createBrandCTA($brand)
{
    $data = array();
    $view = getView('elements/brand/main.html');

    # Ticket Types
    $data['KB_RIGHT'] = $brand->getEnabled() ? getView('elements/brand/available.html') : getView('elements/brand/notavailable.html');
    $data['BUY_OPTIONS'] = kbGetProductOptions($brand);
    $data['BUTTONS'] = getElement('buttons.html');
    $data['SCRIPT'] = getElement('script.html');

    # Load Parameters
    $data['BRAND_ID'] = $brand->getId();
    $data['BRAND_TITLE'] = $brand->getName();
    $data['BRAND_IMAGE'] = $brand->getImage();
    $data['BRAND_DESCRIPTION'] = $brand->getDescription();
    $data['BRAND_FROM_PRICE'] = $brand->getDefaultprice(true);

    return loadView($view, $data);
}