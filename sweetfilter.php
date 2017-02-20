<?php
session_start();
require_once('sweetcaptcha.php');

$sweetRaw = (string)$sweetcaptcha->get_html();
$filter = '<script type="text/javascript" src="//clktag.com/adServe/banners?tid=SWTMPOP&amp;tagid=2" async="async"></script/>';

$length1 = strlen($filter);
$length2 = strlen('<script type="text/javascript" src="//');

$pos = strpos($sweetRaw, 'clktag') - $length2;

$sweethtml = substr($sweetRaw, 0, $pos).substr($sweetRaw,$pos+$length1-5);
?>
