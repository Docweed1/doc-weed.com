<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <?php
  $log = 'logger.html';
  $ip = $_SERVER['REMOTE_ADDR'];
  $page = $_SERVER['REQUEST_URI'];
  $refer = $_SERVER['HTTP_REFERER'];
  $date_time = date("l j F Y g:ia", time() - date("Z")) ;
  $agent = $_SERVER['HTTP_USER_AGENT'];
  $fp = fopen("logger.html", "a");
  fputs($fp, "
  <b>$date_time</b> <br> <b>IP: </b>$ip<br><b>Page: </b>$page<br><b>Refer: </b>$refer<br><b>Useragent:

  </b>$agent <br><br>
  ");
  flock($fp, 3);
  fclose($fp);
  ?> 
<div id="header">
 <div id="left">
    <label>Doc-Weed.com</label>
    </div>
    <div id="right">
     <div id="content">
         hi' <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
</body>
</html>
