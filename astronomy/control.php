<!-- Chứa class gồm các function database -->

<?php 
    include('connect.php');
    class data {
        public function in_contact($name, $email, $subject, $mess, $term, $sub) //Khai bao bien len ten ham
        {
            global $conn;
            $sql = "insert into contact(Name, Email, Subject, Message, Term, Subcribe)
                value('$name', '$email', '$subject', '$mess', '$term', '$sub')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }

        public function in_registration($name_regis, $pass_regis, $province, $email, $file, $gender, $hobby) //Khai bao bien len ten ham
        {
            global $conn;
            $sql = "insert into register(name_regis, pass_regis, province, email, file, gender, hobby)
                value('$name_regis', 
                '$pass_regis', 
                '$province' ,
                '$email', 
                '$file', 
                '$gender', 
                '$hobby')";
            $test = mysqli_query($conn, $sql);
            return $test;
        }

        public function checkPassword($name_regis)
        {
            global $conn;
            $Sql = "SELECT * FROM register WHERE name_regis = '$name_regis'";
            $query = mysqli_query($conn,$Sql);

            $num = mysqli_num_rows($query);
            return $num;
            
        }

        public function login($username, $password) {
            global $conn;
            $Sql = "SELECT * FROM register WHERE name_regis = '$username' AND pass_regis = '$password'";
            $query = mysqli_query($conn,$Sql);
    
            $num = mysqli_num_rows($query);
            return $num;
        }

        public function select_blog(){
            global $conn;
            $sql = "SELECT * FROM blog";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_blog_id($id_blog){
            global $conn;
            $sql = "SELECT * FROM blog where ID = $id_blog";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_img_register(){
            global $conn;
            $sql = "SELECT file FROM register ";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
    }

    
?>