<?php
$logfile = '/home/admin/logs/gitlab-jstorm-doc.log';

function log_append($message, $time = null)
{
    global $logfile;

    $time = $time === null ? time() : $time;
    $date = date('Y-m-d H:i:s');
    $pre  = $date . ' (' . $_SERVER['REMOTE_ADDR'] . '): ';

    file_put_contents($logfile, $pre . $message . "\n", FILE_APPEND);
}
try
{
  $de_json =  json_decode($GLOBALS['HTTP_RAW_POST_DATA'], TRUE);
}
catch(Exception $e)
{
  log_append($e);
  exit(0);
}

log_append($de_json);
if ($de_json['ref'] === 'refs/heads/master')
{
  // path to your site deployment script
  log_append('Launching shell hook script...');
  exec('/home/admin/www/data/jstorm-doc-deploy.sh');
  log_append('Shell hook script finished');
}
else{
  log_append('Ignoring ref ' . $de_json['ref']);
}