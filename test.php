<?php

require_once('BuildAPI.php');

$bi = New BuildAPI();
//$bi->config('asdofiahdsfajkfd','s3d3r3');
$bi->run('math','multiply', array('numbers' => array(10,20,30)));
