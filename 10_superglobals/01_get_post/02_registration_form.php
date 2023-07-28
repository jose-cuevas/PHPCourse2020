<?php


define('REQUIRED_FIELD_ERROR', 'This field is required');
$errors = [];
$username = "";
$email = "";
$password = "";
$password_confirm = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    if (!$username) {
        $errors['username'] = REQUIRED_FIELD_ERROR;
    } else if (strlen($username < 6) && strlen($username > 16)) {
        $errors['username'] = "Min 6 max 16 characters";
    } 

    if (!$email) {
        $errors['email'] = REQUIRED_FIELD_ERROR;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Insert a valid email";
    }
    
    if (!$password) {
        $errors['password'] = REQUIRED_FIELD_ERROR;        
    }

    if (!$password_confirm){
        $errors['password_confirm'] = REQUIRED_FIELD_ERROR;
    }

    if ($password && $password_confirm && strcmp($password,$password_confirm) !== 0){
        $errors['password_confirm'] = "The passwords are not the same";
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" novalidate>
        <div>
            <label for="">Username</label>
            <input type="text" name="username" value="<?php echo $username?>" id="">
            <p style='color: red; font-weight: bold'><?php echo $errors['username'] ?? '' ?></p>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $email?>" id="">
            <p style='color: red; font-weight: bold'><?php echo $errors['email'] ?? '' ?></p>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" value="<?php echo $password?>" id="">
            <p style='color: red; font-weight: bold'><?php echo $errors['password'] ?? '' ?></p>
        </div>
        <div>
            <label for="">Comfirm Password</label>
            <input type="password" name="password_confirm" value="<?php echo $password_confirm?>" id="">
            <p style='color: red; font-weight: bold'><?php echo $errors['password_confirm'] ?? "" ?></p>
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>

</body>

</html>