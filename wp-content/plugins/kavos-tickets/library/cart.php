<?php

function kbGetCart()
{
    return array_lookup($_SESSION, 'kbcart');
}

function kbGetCartTable()
{
    $cart = kbGetCart();

    if ($cart AND is_array($cart)) {
        global $wpdb;

        $rows = '';
        $table = getElement('cart/main.html');
        $row = getElement('cart/row.html');

        $form = getElement('cart/paypal.html');
        $paypal_item = getElement('cart/paypal_item.html');
        $pp_items='';

        $counter=1;
        $subtotal=0;

//        sja_debug($cart);

        foreach ($cart as $key => $cartitem) {
            $thisrow = $row;
            $eventid = array_lookup($cartitem, 'eventid');
            $quantity = array_lookup($cartitem, 'quantity', '');

            if ($eventid AND $quantity) {
                $event = new Event($eventid);
                $name = $event->getDisplayName();
                $paypalname = $event->getPaypalName();
                $price = $event->getPrice($cartitem['variations']);
                $total = $price * $quantity;
                $subtotal += $total;
                $thisrow = str_replace('{SINGLE_PRICE}', $quantity . ' x ' . kbFormatPrice($price), $thisrow);
                $thisrow = str_replace('{EVENT_NAME}', $name, $thisrow);
                $thisrow = str_replace('{TOTAL_PRICE}', kbFormatPrice($total), $thisrow);
                $rows .= $thisrow;

                # Generate Paypal Form
                $thisitem = $paypal_item;
                $thisitem = str_replace('{COUNTER}', $counter, $thisitem);
                $thisitem = str_replace('{ITEM_NAME}', $name, $thisitem);
                $thisitem = str_replace('{ITEM_PRICE}', $event->getPaypalPrice(), $thisitem);
                $thisitem = str_replace('{ITEM_QUANTITY}', $quantity, $thisitem);

                $pp_items .= $thisitem;

                $counter++;
            }
        }

        $form = str_replace('{PAYPAL_ITEMS}', $pp_items, $form);

        $table = str_replace('{PAYPAL}', $form, $table);
        $table = str_replace('{TABLE_ROWS}', $rows, $table);
        $table = str_replace('{SUB_TOTAL}', kbFormatPrice($subtotal), $table);

        return $table;
    }

    return '';
}