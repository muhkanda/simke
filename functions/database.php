<?php
	$host	= "localhost";
	$uname	= "root";
	$pass	= "";
	$db 	= "db_simke_local";
	$conn 	= mysqli_connect($host, $uname, $pass, $db);
	if (mysqli_connect_errno()) {
		echo "Koneksi Database Gagal : ".mysqli_connect_errno();
	}
?>
<!-- 
	~~~~~~~~~~~~~~~~~
	H : muhkanda.tech
	U : jwwunqak_simke
	P : @Adminer2019
	~~~~~~~~~~~~~~~~~
	H : remotemysql.com
	U : bSghyCT7Rh
	P : N4iw7pNeLr
	~~~~~~~~~~~~~~~~~
	/ ~
 -->