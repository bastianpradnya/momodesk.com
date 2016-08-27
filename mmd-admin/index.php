
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Sign In MomoDesk Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
<?php
    function sessionCek($conn){
        /*
        * function session cek ini digunakan untuk melakukan validasi.
        * dimana jika suatu sesi telah habis maka akan dilakukan direct ke login page.
        * dalam pengunaan fungsi ini harus menyertakan terlebih dahulu pemanggilan fungsi Session_start()
        * agar fungsi sessionCek ini dapat digunakan.
        */

        if(isset($_SESSION['username'])){
            $adminName = null;
            $admin_check = $_SESSION['username'];

            $sql = "SELECT name_admin FROM admin WHERE username ='$admin_check' ";
            $result = $conn->query($sql) or trigger_error($result);

            if($result->num_rows > 0) {
                header("Location:../mmd-admin/dashboard.php ");
            }else{
                /*
                * Jika Record KOSONG dari hasil query maka pada kondisi ini
                * Direct login dilakukan dimana admin melakukan login kembali untuk masuk kehalaman admin.
                */

                echo "
                      <script language='javascript'>
                           window.location.href = '../mmd-admin/index.php'
                      </script>";
            }
        }
        /*
         * return pada variabel admin name digunakan untuk mengembalikan nilai dari variabel admin name
         * dimana pada variabel ini nantinya dapat digunakan diluar function ini.
         * salah satu penggunaannya adalah menampilkan nama user admin yang sedang login.
         */
    }
?>

	<div class="login">
		<h1><a href="#">MomoDesk </a></h1>
		<div class="login-bottom">

			<?php
            	include "../config/connectDb.php";
            		//memulai session
                	session_start();
                	
                    //validasi jika user sudah login dengan memanggil fungsi sessioncek
                    sessionCek($conn);

                        //deklarate variabel
                        $pesan = array(null, null, null, null );
                        $formWarning =  array(null, null, null, null);
                        $username = $password = $salah = null;


                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            if(empty($username) || empty($password)){

                                if(empty($username)){
                                    $pesan[0] = "* username tidak boleh kosong.";
                                    $formWarning[0] = "has-warning";
                                }
                                 if(empty($password)){
                                    $pesan[1] = "* password tidak boleh kosong.";
                                    $formWarning[1] = "has-warning";
                                }

                            }else{

                                $sql = "SELECT username FROM admin WHERE username = '$username' AND password ='$password' ";
                                $result = $conn->query($sql) or trigger_error($result);

                                if($result->num_rows > 0){
                                    //pemanggilan record menjadi array asosiatif.
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                    //inisialisasi aray asosiatif menjadi var
                                    $sesNamaAdm = $row ['username'];

                                    /*
                                     * digunakan untuk membuat sesi,
                                     * dimana sesi ini digunakan untuk mengakses halaman admin.
                                     */
                                    $_SESSION['username'] = $sesNamaAdm;

                                    /*
                                     * jika username dan password sesuai dengan data yang ada didatabase
                                     * maka dilakukan direct link ke halaman Admin.
                                     * dirrect link ini menuju ke halaman dashboard admin.
                                     */
                                    echo "
                                    Loading...
                                        <script language='javascript'>
                                             window.location.href = '../mmd-admin/dashboard.php'
                                        </script>
                                       ";
                                }else{
                                    $salah = "* username atau password salah";
                                }
                            }
                        }
                    ?>

			<h2>Login</h2>
			<form role="form" method="post" action="#">
			<div class="col-md-6">
				<div class="login-mail">
					<input placeholder="Masukkan username" value="<?php echo $username?>" name="username" type="text" autofocus>
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input placeholder="Password" name="password" type="password" value="">
					<i class="fa fa-lock"></i>
				</div>
				<p><i><?php echo $pesan[0] ?></i></p>
				<p><i><?php echo $salah ?></i></p>
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="Login">
					</label>
					<p>Do not have an account?</p>
				<a href="#" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	    </div>  
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

