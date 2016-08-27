<?php
Class tableDb{
	public function tableAdmin($conn){
		/*
		| crerate table admin
		| admin field is : .
		*/
		$tablename = "admin";
		$cektable = "select id_admin from ".$tablename;
		if($conn->query($cektable) === FALSE){

			$sql = "CREATE TABLE ".$tablename." (
			id_admin INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			name_admin VARCHAR(50) NOT NULL,
			email_admin VARCHAR(255),
			username VARCHAR(20) unique,
			password CHAR(50) NOT NULL,
			reg_date TIMESTAMP
			)";
			if ($conn->query($sql) === TRUE) {
			    echo "<b>Table $tablename created successfully <br></b>";
			} else {
			    echo "Error creating table : " . $conn->error."<br>";
			}
		}else{
			echo "Table $tablename is Exist !!! <br>";
		}
	}


	public function tableDesign($conn){
		/*
		| Create table Design
		| design field is : .
		*/
		$tablename = "design";
		$cektable = "select id_design from ".$tablename;
		if($conn->query($cektable) === FALSE){
			
			$sql = "CREATE TABLE ".$tablename." (
			id_design INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			id_design_category INT(6),
			name_design VARCHAR(120) NOT NULL,
			image_design VARCHAR(255),
			design_date TIMESTAMP
			)";
			if ($conn->query($sql) === TRUE) {
			    echo "<b>Table $tablename created successfully <br></b>";
			} else {
			    echo "Error creating table : " . $conn->error."<br>";
			}
		}else{
			echo "Table $tablename is Exist !!! <br>";
		}
	}
		public function designCategory($conn){
		/*
		 * category artikel digunakan untuk menampilkan kategori pada menu list
		 * didalam artikel, editing blog.
		 * field yang diperlukan dalam membuat kategori berupa id dan category
		 */
		$tablename = "design_category";
		$cektable = "select id_design_category from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_design_category INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				category_design VARCHAR(20) NOT NULL
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully<br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}	
	public function tablePartner($conn){
		/*
		 * This function for creating table Blog to database
		 * table blog have field there are id, Judul artikel, Konten artikel, status, kategori, tanggal publish,
		 * field status digunakan untuk mendeskripsikan artikel tersebut aktif atau nonaktif untuk di tampilkan di blog user.
		 *
		 */
		$tablename = "partner";
		$cektable = "select id_partner from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_partner INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name_partner VARCHAR(120) NOT NULL,
				about_partner TEXT,
				image_partner VARCHAR(255),
				status ENUM('published','unpublished'),
				partner_time TIMESTAMP,
				view INT(6)
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully <br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}
	public function blogArticle($conn){
		/*
		 * This function for creating table Blog to database
		 * table blog have field there are id, Judul artikel, Konten artikel, status, kategori, tanggal publish,
		 * field status digunakan untuk mendeskripsikan artikel tersebut aktif atau nonaktif untuk di tampilkan di blog user.
		 *
		 */
		$tablename = "blog_article";
		$cektable = "select id_article from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_article INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				id_blog_category INT(6),
				title_article VARCHAR(50) NOT NULL,
				content_article TEXT,
				status ENUM('published','unpublished'),
				blog_time TIMESTAMP,
				view INT(6)
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully <br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}
	public function blogCategory($conn){
		/*
		 * category artikel digunakan untuk menampilkan kategori pada menu list
		 * didalam artikel, editing blog.
		 * field yang diperlukan dalam membuat kategori berupa id dan category
		 */
		$tablename = "blog_category";
		$cektable = "select id_blog_category from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_blog_category INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				category_blog VARCHAR(20) NOT NULL
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully<br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}
	public function blogComment($conn){
		/*
		 * function blogComentar digunakan untuk membuat tabel komentar
		 * pada kontent blog. dimana tabel komentar ini berisi field berupa :
		 *
		 */
		$tablename = "blog_comment";
		$cektable = "select id_comment from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_comment INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				id_articel INT(6) NOT NULL,
				name_comment VARCHAR(120),
				email_comment VARCHAR(50),
				content_comment TEXT,
				comment_time TIMESTAMP
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully<br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}
	public function bannerBackground($conn){
		/*
		 * function blogComentar digunakan untuk membuat tabel komentar
		 * pada kontent blog. dimana tabel komentar ini berisi field berupa :
		 *
		 */
		$tablename = "banner";
		$cektable = "select id_banner from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_banner INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				title_banner VARCHAR(50) NOT NULL,
				image_banner VARCHAR(255),
				status_banner ENUM('published','unpublished'),
				update_time TIMESTAMP
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully<br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}
	public function ContactUs($conn){
		/*
		 * function Contack digunakan untuk membuat tabel kontak
		 * pada halaman hubungi kami. dimana tabel ini berisi field berupa :
		 *
		 */
		$tablename = "contact_us";
		$cektable = "select id_contact from ".$tablename;

		if($conn->query($cektable) === FALSE){
			/*
			 * Jika tabel kosong didalam database maka logic ini dijalankan
			 */
			$sql = "CREATE TABLE ".$tablename." (
				id_contact INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name_contact VARCHAR(120) NOT NULL,
				email_contact VARCHAR(50),
				subject_contact VARCHAR(255),
				messages TEXT,
				status ENUM('read','unread'),
				contact_time TIMESTAMP
				)";
			if($conn->query($sql) === TRUE){
				echo "<b>Table $tablename created Succesfully<br></b>";
			}else{
				echo "Error creating table : ". $conn->error."<br>";
			}
		}else{
			/*
			 * else statement if condition cek tables is done
			 * and table creating already exist.
			 */
			echo "Table $tablename is Exist !!! <br>";
		}
	}
}
?>