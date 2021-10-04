<?php
/*
**********************************Authenticaion File ***************************************
*/

//include Database configuration file
include "config/config.php";
include "functions.php";


//code for registering Admin User
if(isset($_POST['register_admin']))
{
    //for input errors
    $_SESSION['username_e']= "";
    $_SESSION['email_e']= "";
    $_SESSION['password_e']= "";
    $_SESSION['general_e']= "";

    //variables for storing input
    $username="";
    $email="";
    $password="";
    $role="1"; //for superadmin
    $ustatus="1"; //approved

    //check input to avoid sql injection using custom function check_input_data
    $username=check_input_data($_POST['username']);
    $email=check_input_data($_POST['email']);
    $password=check_input_data($_POST['password']);

    //for form data
    $_SESSION['username']=$username;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

    //Validating Input fields for errors
    $status=1;
    if(!isset($username) || empty($username))
    {
        $_SESSION['username_e']= "Username cannot be Empty!";
        $status=0;
        header('Location: register.php');
    }
    elseif(strlen($username) < 4)
    {
        $_SESSION['username_e']= "Username cannot be Less then 4 characters!";
        $status=0;
        header('Location: register.php');
    }
    elseif(!isset($email) || empty($email))
    {
        $_SESSION['email_e']= "email cannot be Empty!";
        $status=0;
        header('Location: register.php');
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['email_e']= "please enter valid Email!";
        $status=0;
        header('Location: register.php');
    }
    elseif(!isset($password) || empty($password))
    {
        $_SESSION['password_e']= "Password cannot be Empty!";
        $status=0;
        header('Location: register.php');
    }
    elseif(strlen($password) < 6)
    {
        $_SESSION['password_e']= "Password cannot be Less then 6 characters!";
        $status=0;
        header('Location: register.php');
    }
    else
    {
        if($status==1)
        {
            try
            {
                $status=1;
                //check if this email already exists in database
                $select_user=$db->prepare("SELECT email from users WHERE email=:uemail");
                $select_user->execute(array(':uemail'=>$email));
                $row=$select_user->fetch(PDO::FETCH_ASSOC);
                if($row['email'] == $email)
                {
                    $_SESSION['general_e']= "This email is already in use!";
                    header('Location: register.php');
                }
                else
                {
                    $hashed_password=password_hash($password, PASSWORD_DEFAULT);
                    $register=$db->prepare("INSERT INTO users (username,email,password,status,utype) values(?,?,?,?,?)");
                    $result=$register->execute(array($username,$email,$hashed_password,$ustatus,$role));
                    $_SESSION['general_e']="Your account added Successfully";

                    reset_register_data();

                    //Set Success Data

                    $_SESSION['success_title']= "Successfully Registered";
                    header('Location: success.php');
                }
            } catch (PDOException $e) {
                echo "Registration Failed".$e->getMessage();
            }
        }
    }
}






//code for Login
if(isset($_POST['login_user']))
{

    //for input errors
    $_SESSION['email_e']= "";
    $_SESSION['password_e']= "";
    $_SESSION['general_e']= "";

    //variables for storing input
    $email="";
    $password=$_POST['password'];

    //check input to avoid sql injection using custom function check_input_data
    $email=check_input_data($_POST['email']);

    //for form data
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

    //Validating Input fields for errors
    $status=1;

    if(!isset($email) || empty($email))
    {
        $_SESSION['email_e']= "email cannot be Empty!";
        $status=0;
        header('Location: login.php');
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['email_e']= "please enter valid Email!";
        $status=0;
        header('Location: login.php');
    }
    elseif(!isset($password) || empty($password))
    {
        $_SESSION['password_e']= "Password cannot be Empty!";
        $status=0;
        header('Location: login.php');
    }
    else
    {
        if($status==1)
        {
            try
            {
                $status=1;
                //check if this email already exists in database
                $select_user=$db->prepare("SELECT * from users WHERE email=:uemail");
                $select_user->execute(array(':uemail'=>$email));
                $row=$select_user->fetch(PDO::FETCH_ASSOC);
                if($select_user->rowCount() > 0) //check if user exists
                {
                    if($email==$row['email'])
                    {
                        $hash=$row['password'];
                        if(password_verify($password,$hash))
                        {
                            reset_login_data();
                            reset_login_error_msg();

                            //Set User Session
                            $_SESSION['user_id']=$row['uid'];
                            $_SESSION['username']=$row['username'];
                            $_SESSION['email']=$row['email'];
                            $_SESSION['user_type']=$row['utype'];
                            $_SESSION['ustatus']=$row['status'];

                            //Now redirect to specific page according to user type
                            if($row['utype'] == 1)
                            {
                                header('Location: index.php');
                            }
                        }
                        else
                        {
                            $_SESSION['general_e']= "Your Email or Password is Wrong!";
                            $status=0;
                            header('Location: login.php');
                        }
                    }
                    else
                    {
                        $_SESSION['general_e']= "Your Email or Password is Wrong!";
                        $status=0;
                        header('Location: login.php');
                    }
                }
            } catch (PDOException $e) {
                echo "Authentication Failed".$e->getMessage();
            }
        }
    }
}

?>