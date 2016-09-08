 <?php

    //panggil database dbconnect untuk melakukan proses query
    require "../config/connectDb.php";

    session_start();

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
                //pemanggilan record menjadi array asosiatif.
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                //institalize to var
                $adminName = $row['name_admin'];

            }else{
                /*
                * Jika Record KOSONG dari hasil query maka pada kondisi ini
                * Direct login dilakukan dimana admin melakukan login kembali untuk masuk kehalaman admin.
                */

                echo "
                  <script language='javascript'>
                       window.location.href = '../mmd-admin/login.php'
                  </script>";
            }
         //   $conn->close();

        }else{
            /*
            * jika variabel sesi dengan element username kosong maka dilakukan direct link
            * dimana user admin melakukan login kembali untuk mengakses halaman admin.
            */
            echo "
                  <script language='javascript'>
                       window.location.href = '../mmd-admin/login.php'
                  </script>";

        }
        /*
         * return pada variabel admin name digunakan untuk mengembalikan nilai dari variabel admin name
         * dimana pada variabel ini nantinya dapat digunakan diluar function ini.
         * salah satu penggunaannya adalah menampilkan nama user admin yang sedang login.
         */
        return $adminName;
    }

    //jalankan fungsi sessionCek
    sessionCek($conn);
    ?>