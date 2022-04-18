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
            // $Sql = "SELECT * FROM login WHERE user = '$username' AND password = '$password'";
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

        public function select_all_admin(){
            global $conn;
            $sql = "SELECT * FROM register";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_admin_regis($ID){
            global $conn;
            $sql = "DELETE FROM register WHERE ID_regis = $ID";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function select_id_regis($ID_sua){
            global $conn;
            $sql = "SELECT * FROM register WHERE ID_regis = $ID_sua";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        // public function update_regis($ID_update,$name_regis, $province, $email, $file,$gender,$hobby)
        public function update_regis($ID_update,$name_regis, $email, $file,$gender,$hobby){
            global $conn;
            $sql = "UPDATE register 
                    SET name_regis = '$name_regis', 
                        email = '$email', 
                        file = '$file', 
                        gender='$gender',
                        hobby='$hobby'
                    WHERE ID_regis = $ID_update";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function delete_user_blog($ID){
            global $conn;
            $sql = "DELETE FROM blog WHERE ID = $ID";
            $run = mysqli_query($conn,$sql);
            return $run;
        }


        // 4/5/2021
        public function select_all_blog(){
            global $conn;
            $sql = "SELECT * FROM blog";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function select_id_blog($ID_sua){
            global $conn;
            $sql = "SELECT * FROM blog WHERE ID = $ID_sua";
            $run = mysqli_query($conn,$sql);
            return $run;
        }
        public function update_blog($ID_update,$title, $Date, $S_Content,$L_content){
            global $conn;
            $sql = "UPDATE blog 
                    SET title = '$title', 
                    Date = '$Date', 
                        S_Content = '$S_Content', 
                        L_content='$L_content'
                    WHERE ID = $ID_update";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        // TODO:
        function select_role($ten){
            global $conn;
            $sql = "SELECT * FROM register where name_regis = '$ten'";
            $run = mysqli_query($conn,$sql);
            return $run;
        }

        public function in_blog($title, $Date, $S_Content, $L_content) //Khai bao bien len ten ham
        {
            global $conn;
            $sql = "insert into blog(title, Date, S_Content, L_content)
                value('$title', '$Date', '$S_Content', '$L_content')";
            $run = mysqli_query($conn, $sql);
            return $run;
        }

    }

    
?>