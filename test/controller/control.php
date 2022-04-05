<?php 
    include('connect.php');
    class data{
        public function insert_regis($email, $password) //Khai bao bien len ten ham
        {
            global $conn;
            $sql = "insert into register(email, password)
                value('$email', '$password')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }

        public function checkEmail($email)
        {
            global $conn;
            $Sql = "SELECT * FROM register WHERE email = '$email'";
            $query = mysqli_query($conn,$Sql);

            $num = mysqli_num_rows($query);
            return $num;
        }

        public function login($email, $password) {
            global $conn;
            $Sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
            $query = mysqli_query($conn,$Sql);
    
            $num = mysqli_num_rows($query);
            return $num;
        }

        // add blog
        // blog.php
        public function add_blog($author,$title_blog,$date_blog,$sort_content_blog,$long_content){
            global $conn;
            $sql = "insert into addblog(author,title_blog,date_blog,sort_content_blog,long_content) values('$author','$title_blog','$date_blog','$sort_content_blog','$long_content')";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_db_blog(){
            global $conn;
            $sql = "SELECT * FROM addblog";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
    }
?>