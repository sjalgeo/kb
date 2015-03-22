<script type="text/javascript">

window.siteurl = 'http://www.kavosbooked.com/';

function kbRemoveRow(id)
{
    console.log(id);
    var $data={};
    $data['key'] = id;

    jQuery.ajax({
        url: window.siteurl + 'wp-content/plugins/kavos-tickets/ajax/cart-remove.php',
        type: 'POST',
        data: $data,
        success: function(data, textStatus, xhr) {
            jQuery('#cart_holder').html(data);
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
    });
}

</script>