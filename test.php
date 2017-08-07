<?php

require_once('BuildAPI.php');

$bi = New BuildAPI();
//$bi->config('asdofiahdsfajkfd','s3d3r3');
//$bi->run('math','square', array('numbers' => array(100,20,30)));
$bi->run('math','multiply', array('numbers' => array(1,2,3)));
