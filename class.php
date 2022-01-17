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
        <button type="submit">Save</button>
    </form>
<?php
    class User {
        function __construct($fname,$lname,$email)
        {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
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
    }
    $user = new User($_POST['fname'],$_POST['lname'],$_POST['email']);
    echo $user->get_fname().'<br>';
    echo $user->get_lname().'<br>';
    echo $user->get_email().'<br>';
?>    
</body>
</html>