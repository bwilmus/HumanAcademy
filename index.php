<?php
require("views/view_header.php");

$model = isset($_GET["model"]) ? $_GET["model"] : 'student';
$method = isset($_GET["method"]) ? $_GET["method"] : 'list';

$inc = "models/".$model.".php";

if (file_exists($inc) && is_readable($inc)) {
    include $inc;
} else {
    die('Model '.$model.' file does not exists or is not readable.');
}

$function_name = "get".ucfirst($model).ucfirst($method);

if (function_exists($function_name)) {
	$params = array_merge($_POST, $_GET);
	$tpl_vars = $function_name($params);
} else {
	die ("Error: ".$model." has not ".$method." function implemented");
}

$view = "views/view_".$model."_".$method.".php";

if (file_exists($view) && is_readable($view)) {
    include $view;
} else {
    die('View '.$view.' file does not exists or is not readable.');
}

require("views/view_footer.php");

?>