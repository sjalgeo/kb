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
        $script = getElement('cart/script.js');
        $paypal_item = getElement('cart/paypal_item.html');
        $pp_items='';

        $counter=1;
        $subtotal=0;

        foreach ($cart as $key => $cartitem) {
            $thisrow = $row;
            $eventid = array_lookup($cartitem, 'eventid');
            $quantity = array_lookup($cartitem, 'quantity', '');

            if ($eventid AND $quantity) {
                $event = new Event($eventid);
                $name = $event->getDisplayName($cartitem['variations']);
                $paypalname = $event->getPaypalName();

                $priceraw = $event->getPriceRaw($cartitem['variations']);
                $price = $event->getPrice($cartitem['variations']);

                $total = $priceraw * $quantity;
                $subtotal += $total;
                $thisrow = str_replace('{SINGLE_PRICE}', $quantity . ' x ' . $price, $thisrow);
                $thisrow = str_replace('{EVENT_NAME}', $name, $thisrow);
                $thisrow = str_replace('{TOTAL_PRICE}', kbFormatPrice($total), $thisrow);
                $thisrow = str_replace('{ITEM_ID}', str_replace('.', '_', $key), $thisrow);
                $rows .= $thisrow;

                $variations = '';
                $varcount = 0;

                foreach($cartitem['variations'] as $key => $var)
                {
                    $variations .= '<input type="hidden" name="on'.$varcount.'_'.$counter.'" value="'.$key.'">';
                    $variations .= '<input type="hidden" name="os'.$varcount.'_'.$counter.'" value="'.$var.'">';

                    $varcount++;
                }


                # Generate Paypal Form
                $thisitem = $paypal_item;
                $thisitem = str_replace('{COUNTER}', $counter, $thisitem);
                $thisitem = str_replace('{ITEM_NAME}', $name, $thisitem);
                $thisitem = str_replace('{ITEM_ID}', $event->getId(), $thisitem);
                $thisitem = str_replace('{ITEM_PRICE}', $event->getPaypalPrice($cartitem['variations']), $thisitem);
                $thisitem = str_replace('{ITEM_QUANTITY}', $quantity, $thisitem);


                $thisitem = str_replace('{ITEM_VARIATIONS}', $variations, $thisitem);

                $pp_items .= $thisitem;

                $counter++;
            }
        }

        $form = str_replace('{PAYPAL_ITEMS}', $pp_items, $form);

        $table = str_replace('{PAYPAL}', $form, $table);
        $table = str_replace('{SCRIPT}', $script, $table);
        $table = str_replace('{TABLE_ROWS}', $rows, $table);
        $table = str_replace('{SUB_TOTAL}', kbFormatPrice($subtotal), $table);

        return $table;
    }

    return '<p>There are no items currently in your cart.</p>';
}