<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>class.php</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
        }
        input {
            width: 200px;
            margin: 5px 0;
        }
        button {
            width: 210px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="fname">First Name</label>
        <input type="text" name="fname">
        <label for="lname">Last Name</label>
        <input type="text" name="lname">
        <label for="email">Email Address</label>
        <input type="email" name="email">
        <label for="course">Course</label>
        <input type="text" name="course">
        <button type="submit">Save</button>
    </form>
<?php
    class User {
        function __construct($fname,$lname,$email,$course)
        {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->course = $course;
        }
        // set method
        function set_fname($fname) {
            $this->fname = $fname;
        }
        function set_lname($lname) {
            $this->lname = $lname;
        }
        function set_email($email) {
            $this->email = $email;
        }
        function set_course($course) {
            $this->course = $course;
        }
        // get method
        function get_fname() {
            return $this->fname;
        }
        function get_lname() {
            return $this->lname;
        }
        function get_email() {
            return $this->email;
        }
        function get_course() {
            return $this->course;
        }
        // function to save the user data to the directory
        function data_save($destFile) {
            $file_name = $this->fname.'_'.$this->lname.'.txt';
            $file = fopen($destFile.'/'.$file_name,'w');
            fwrite($file,'First Name: '.$this->fname."\n");
            fwrite($file,'Last Name: '.$this->lname."\n");
            fclose($file);
        }
    }
    $user = new User($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['course']);
    echo $user->get_fname().'<br>';
    echo $user->get_lname().'<br>';
    echo $user->get_email().'<br>';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dest_file = "./course/".$_POST['course'];
        mkdir($dest_file);
        $user->data_save($dest_file);
    }
?>    
</body>
</html>