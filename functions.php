<?php
/*
***************************** This is file for utility functions *****************************
*/

//Start Session
session_start();

/*
****************************** Utility Functions ***************************************
*/

//function to process input for sql injection
function check_input_data($input)
{
    //processing input to remove extra spaces
    $data=trim($input);

    //processing input to remove extra spaces
    $data=stripslashes($data);

    //processing input to remove special characters
     $data=htmlspecialchars($data);
    //return processed input
    return $data;
}

//function to reset register error message
function reset_register_error_msg()
{
    $_SESSION['username_e']= "";
    $_SESSION['email_e']= "";
    $_SESSION['password_e']= "";
    $_SESSION['general_e']= "";
}

//function to reset register form Data
function reset_register_data()
{
    $_SESSION['username']= "";
    $_SESSION['email']= "";
    $_SESSION['password']= "";
}


//function to reset success data
function reset_success_error_msg()
{
    $_SESSION['general_e']= "";
    $_SESSION['success_title']= "";
}



//function to reset login error message
function reset_login_error_msg()
{
    $_SESSION['email_e']= "";
    $_SESSION['password_e']= "";
    $_SESSION['general_e']= "";
}
//function to reset Login  form Data
function reset_login_data()
{
    $_SESSION['email']= "";
    $_SESSION['password']= "";
}

?>