<?php


function my_the_content_filter($content) {






    if ($GLOBALS['post']->post_name=='home'){
$ad = '
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ldboard -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9340225966707192"
     data-ad-slot="5333019062"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
';
    }
    else if ($GLOBALS['post']->post_name=='cart'){
        return $content;
    }
    else {
        $ad = '

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 468x60 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-9340225966707192"
     data-ad-slot="7867683061"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

';
    }

    $ad = '<div style="display:block;clear:both;margin:0 auto;"><p style="text-align:center;">'.$ad.'</p> </div>';

    return $ad.$content.$ad;
}

add_filter( 'the_content', 'my_the_content_filter' );