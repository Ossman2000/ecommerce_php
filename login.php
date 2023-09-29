
<?php 
 session_start();
$pagetitle = 'login';
if (isset($_SESSION['user'])) {
    header('Location: index.php');
}
    include 'init.php';


 if ($_SERVER['REQUEST_METHOD'] =='POST' ) {
    if (isset($_POST['login'])) {
        // code...
    
    $user = $_POST['Username'];
    $pass = $_POST['Password'];
    $hashedPass = sha1($pass);


$stmt = $con->prepare("SELECT UserID, username, password FROM users WHERE username = ? AND password = ?");

$stmt->execute(array($user,$hashedPass));


$count = $stmt->rowCount();
if($count > 0){
    $_SESSION['user'] = $user;//register session name
    header('Location: index.php');//redirect to dashboard page
   exit();
 }
}else{
   $formErrors=array();
   $username=$_POST['Username'];
   $password=$_POST['Password'];
   $email=$_POST['email'];


   if (isset($_POST['Username'])) {
    $filterduser=filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
    if(strlen($filterduser)<4){
        $formErrors[]='Username must be more than four characaters';
    }
       // code...
    }



if (isset($_POST['Password'])&&isset($_POST['Password2'])) {
    if (empty($_POST['Password'])) {
    $formErrors[]='password cant be empty';
}

    $pass1=sha1($_POST['Password']);
    $pass2=sha1($_POST['Password2']);
    if ($pass1!==$pass2) {
         $formErrors[]='password is not match';
    }


    }
   if (isset($_POST['email'])) {
    $filterdemail=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if(filter_var($filterdemail,FILTER_SANITIZE_EMAIL) != true){
        $formErrors[]='this email is not valid';
    } // code...
    }
if (empty($formErrors)) {
$check= checkItem("Username","users",$username);
   if ($check==1) {
    $formErrors[]='this user already exists';
   }else{
        $stmt = $con->prepare("INSERT INTO users(Username, Password, Email)
         VALUES(:zuser, :zpass, :zmail)");

$stmt->execute(array(
    'zuser' => $username, 
    'zpass' => sha1($password),
    'zmail' => $email
));

                        $sucessmsg='signup successful';
   }
}

   }


}


?>
<title>login</title>
<div class="container login-page">
    <h1 class="text-center">
        <span class="selected" data-class="login">login</span>|
        <span  data-class="signup">signup</span>
    </h1>
    <!--                    log in form                -->

   <form class="login" action="<?php echo $_SERVER['PHP_SELF']?>"method="POST">
    <div class="input-container">
   	<input class="form-control" type="text" name="Username" autocomplete="off" placeholder="username"  required /> 
   </div>
   <input class="form-control" type="password" name="Password" autocomplete="new-Password" placeholder="password" />
   <input class="btn btn-primary btn-block" name="login" type="submit" value="Login"/>
   </form>
 <!--                    signup form                -->
   <form class="signup" action="<?php echo $_SERVER['PHP_SELF']?>"method="POST">
    <input class="form-control" type="text" name="Username" autocomplete="off" placeholder="username" required minlength="4" />
   <input class="form-control" type="email" name="email" autocomplete="off" placeholder=" type your email" required />
   <input class="form-control" type="password" name="Password" autocomplete="off" placeholder=" password" required minlength="4" />
   <input class="form-control" type="password" name="Password2" autocomplete="off" placeholder="re-enter the password"/>
   <input class="btn btn-success btn-block" name="signup" type="submit" value="signup"/>
   </form>
<div class="the-errors text-center">
<?php
if (!empty($formErrors)){
    foreach($formErrors as $error){
        echo $error . '<br>';
    }
}
if (isset($sucessmsg)) {
   echo '<div class="msg success">'.$sucessmsg.'</div>';
}
?>
    
</div>

</div>

<?php
    include $tpl.'footer.php';
?>