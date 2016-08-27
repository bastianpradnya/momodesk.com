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
                header("Location:../mmd-admin/logout.php ");
            }else{
                /*
                * Jika Record KOSONG dari hasil query maka pada kondisi ini
                * Direct login dilakukan dimana admin melakukan login kembali untuk masuk kehalaman admin.
                */

                header("Location:../mmd-admin/index.php ");
            }
        }
        /*
         * return pada variabel admin name digunakan untuk mengembalikan nilai dari variabel admin name
         * dimana pada variabel ini nantinya dapat digunakan diluar function ini.
         * salah satu penggunaannya adalah menampilkan nama user admin yang sedang login.
         */
    }
?>