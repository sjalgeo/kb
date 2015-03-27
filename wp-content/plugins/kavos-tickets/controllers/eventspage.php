<?php

function showAllEventsByDate()
{
    global $wpdb;

    $events = $wpdb->get_results( 'SELECT * FROM events WHERE date >= NOW() ORDER BY date' );
    $brandstemp = $wpdb->get_results( 'SELECT * FROM brands' );

    $brands = array();

    foreach($brandstemp as $brand)
    {
        $brands[$brand->id] = $brand;
    }

//    sja_debug($events);
//    sja_debug($brands);
    echo '<h1>Events</h1>';


 ?>
    <table>
    <?php
        foreach($events as $event){
            $evt = new Event($event->id);

            ?>
            <tr>
                <td>
                    <img style="width:50px;height:50px;" src="<?php echo $evt->getImage(); ?>">
                </td>
                <td style="padding-left: 20px;">
                    <p class="lineup"><?php echo $evt->getDateFormatted().' - '.$evt->getName(); ?></p>
                </td>
                <td>
                    <a href="<?php echo get_site_url().'/events/'.$evt->getBrand()->getSlug(); ?>">Info/Tickets</a>
                </td>
            </tr>
            <?php
        }
    ?>
    </table>
    <?php

}