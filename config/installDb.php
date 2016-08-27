<?php
	/*
	 * Untuk Menginstal Tabel ke database
	 * silahkan jalankan file installDb ini
	 * agar semua database configurasi dari file TableDb dapat bermigrasi ke database Admin
	 */

	include "../config/connectDb.php";

	if($conn == TRUE) { 
		// Check connection jika conection tersambung.
		echo "Connection is Conected <br>";
	}

	if($dbselect === TRUE){ 
		// mengecek atau memvalidasi jika tabel database sudah ada
		echo"Database $dbname is intalled <br><br>";
	}

	function tabel($conn){
		include "../config/tableDb.php";
		//instace from class tableDb
		$tabelDb = new tableDb();

		//calling FUNCTION and parameter from class TableDb
		$tabelDb->tableAdmin($conn);
		$tabelDb->designCategory($conn);
		$tabelDb->tableDesign($conn);
		$tabelDb->tablePartner($conn);
		$tabelDb->blogArticle($conn);
		$tabelDb->blogCategory($conn);
		$tabelDb->blogComment($conn);
		$tabelDb->bannerBackground($conn);
		$tabelDb->contactUs($conn);
	}

	//jalankan function
	tabel($conn);