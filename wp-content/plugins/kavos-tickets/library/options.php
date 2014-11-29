<?php

function kbGetProductOptions($brand)
{
    global $wpdb;
    $productoptions = $wpdb->get_results('SELECT * FROM productoptions WHERE brand_id = ' . $brand->getId() . ' ORDER BY sortorder ASC');

    $html = '';

    if (is_array($productoptions)){
        foreach($productoptions as $opt)
        {
            $html .= kbGetOption($brand, $opt->optiontype);
        }
    }

    return $html;
}

function kbGetOption($brand, $type)
{
    if ($type=='quantity')
    {
        return kbOptionsQuantity(20);
    }
    elseif ($type=='event'){
        return kbOptionsEvent($brand);
    }
    elseif($type=='viptable')
    {
        return kbOptionsVipTable();
    }
    elseif ($type=='cruiseticket')
    {
        return kbOptionsCruiseTicket();
    }
}

function kbOptionsEvent($brand)
{
    $events = getRemainingEvents($brand);

    # Dates
    if (sizeof($events)>0)
    {
        $select = str_replace('{OPTION_SELECT_ID}', 'kbeventselect', getElement('event-select.html'));

        $date_options='';
        foreach($events as $gig)
        {
            # Show Brand Name if no specified artist
            $showday = array('super-paint-party', 'booze-cruise');
            $date = in_array($brand->getSlug(), $showday) ? cleanDateWithDay($gig->date) : cleanDate($gig->date) ;
            $event_title = ($gig->artist) ? $gig->artist.' - '.$date : $date;


            $temp = getElement('event-option.html');
            $temp = str_replace('{OPTION_TITLE}', $event_title, $temp);
            $temp = str_replace('{OPTION_VALUE}', $gig->id, $temp);
            $temp = str_replace('{OPTION_ID}', 'event-'.$gig->id, $temp);
            $temp = str_replace('{OPTION_DATE}', cleanDate($gig->date), $temp);

            $date_options .= $temp;
        }
        $date_options = str_replace('{OPTIONS_LIST}', $date_options, $select);
        $date_options = str_replace('{OPTION_TYPE}', 'eventid', $date_options);
        return $date_options;
    }

    return '';
}

function kbOptionsQuantity($count){

    # Quantity Dropdown
    $select = str_replace('{OPTION_SELECT_ID}', 'kbquantity', getElement('event-select.html'));
    $quantity_options = '';

    for($i=1;$i<=$count;$i++) {
        $temp = getElement('event-option.html');
        $temp = str_replace('{OPTION_TITLE}', $i, $temp);
        $temp = str_replace('{OPTION_VALUE}', $i, $temp);
        $temp = str_replace('{OPTION_ID}', 'quantity-'.$i, $temp);
        $temp = str_replace('{OPTION_TYPE}', 'quantity', $temp);
//        $temp = str_replace('{OPTION_UPDATE_FUNCTION}', 'quantity', $temp);

        $quantity_options .= $temp;
    }
    $quantity_options = str_replace('{OPTION_TYPE}', "event", $quantity_options);
    $select = str_replace('{OPTIONS_LIST}', $quantity_options, $select);
    $select = str_replace('{OPTION_TYPE}', 'quantity', $select);
    return $select;
}

function kbOptionsVipTable(){

    $arr = array('regular'=>'VIP Tickets (Free Online Upgrade)', 'viptable'=>'VIP Table (Upto 4 people)');

    # VIP Table Dropdown
    $select = str_replace('{OPTION_SELECT_ID}', 'kbviptable', getElement('event-select.html'));
    $options = '';

    foreach($arr as $key=>$opt) {
        $temp = getElement('event-option.html');
        $temp = str_replace('{OPTION_TITLE}', $opt, $temp);
        $temp = str_replace('{OPTION_VALUE}', $key, $temp);
        $temp = str_replace('{OPTION_ID}', 'viptable-'.$key, $temp);
        $temp = str_replace('{OPTION_TYPE}', 'viptable', $temp);

        $options .= $temp;
    }
    $select = str_replace('{OPTIONS_LIST}', $options, $select);
    $select = str_replace('{OPTION_TYPE}', 'viptable', $select);
    return $select;

}

function kbOptionsCruiseTicket(){

//    $arr = array('full'=>'Full Payment (£30)', 'deposit'=>'Deposit (£10)');
    $arr = kbOptionsCruiseTicketData();

    # VIP Table Dropdown
    $select = str_replace('{OPTION_SELECT_ID}', 'kbcruiseticket', getElement('event-select.html'));
    $options = '';

    foreach($arr as $key=>$opt) {
        $temp = getElement('event-option.html');
        $temp = str_replace('{OPTION_TITLE}', $opt['display'], $temp);
        $temp = str_replace('{OPTION_VALUE}', $key, $temp);
        $temp = str_replace('{OPTION_ID}', 'cruiseticket-'.$key, $temp);
        $temp = str_replace('{OPTION_TYPE}', 'cruiseticket', $temp);

        $options .= $temp;
    }

    $select = str_replace('{OPTIONS_LIST}', $options, $select);
    $select = str_replace('{OPTION_TYPE}', 'cruiseticket', $select);
    return $select;

}

function kbOptionsCruiseTicketData()
{
    $opts = array();

    $opt = array(
        'id' => 'full',
        'priceraw'=>'3000',
        'display'=>'Full Payment (£30)'
    );

    $opts['full'] = $opt;

    $opt = array(
        'id' => 'deposit',
        'priceraw'=>'1000',
        'display'=>'Deposit (£10)'
    );

    $opts['deposit'] = $opt;

    return $opts;
}