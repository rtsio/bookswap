<?php
	require_once('common.php');
	echo 'start';
	Print_r(getAllMajorsArray());
	Print_r(getBooksArray('econ'));
	echo 'done';
	flush();
?>