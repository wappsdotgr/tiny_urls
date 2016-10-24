<!-- <a href="http://localhost/github-projects/tiny_urls/l/001/">nml</a>
<a href="http://localhost/github-projects/tiny_urls/l/002/">github</a>
<pre> -->
<?php

# DB Conn
require 'libs/medoo/medoo.php';
$db = new medoo([
	'database_type' => 'sqlite',
	'database_file' => 'system/tiny_urls.sqlite'
]);

# Get Hash
$hash = (isset($_GET['hash']) && $_GET['hash'] != '') ? $_GET['hash']: '';

# DB Query
$link = $db->get("tbl_urls","*",["hash" => $hash]);

# CheckPoint
if (!$link || $link['expires'] < time()) {
	header('Location: http://www.google.com/');
} else {
	header('Location: '.$link['link']);
}

# The End
die();

# DeBug
// print_r($link);
// echo time();
// echo '<br>';
// echo '<br>';

?>
<!-- </pre> -->