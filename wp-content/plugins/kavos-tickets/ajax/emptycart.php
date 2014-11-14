<?php

require_once('../../../../wp-load.php'); // relative path from your PHP file

$_SESSION['kbcart'] = array();

echo json_encode(array('response'=>'success'));