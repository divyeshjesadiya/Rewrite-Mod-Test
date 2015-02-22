<?php
/**
 * Test if the Rewrite Mod is properly installed
 */
 
$sHttp = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://'; // Check SSL compatibility
$sUrl = $sHttp . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$sOutputMsg = 'mod_rewrite Works!';

if ($_SERVER['QUERY_STRING'] == 'test_mod_rewrite')
    exit($sOutputMsg);

$sPage = file_get_contents($sUrl . 'test_mod_rewrite');


if ($sPage == $sOutputMsg)
    $sMsg = 'Well done mate! Rewrite Mod works well ;-)';
else
    $sMsg = '<span style="font-weight:bold;color:red"><a href="http://ph7cms.com">pH7CMS</a> requires Apache "mod_rewrite".</span><br /> Please install it so that pH7CMS can works.<br /> Click <a href="http://ph7cms.com/doc/en/how-to-install-rewrite-module" target="_blank">here</a> if you want to get more information on how to install the rewrite module.<br /><br /> After doing this, please <a href="' . $sUrl . '">retry</a>.</div>';

?>
<!DOCTYPE html><head><title>Rewrite Mod Test</title></head><body><div style="margin-left:auto;margin-right:auto;width:80%;text-align:center"><?php echo $sMsg ?></div></body></html>