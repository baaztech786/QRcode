<?php
include "../../config/config.php";
include "../../functions.php";
if(isset($_POST['user_profile_pass']))
{
    $password=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];

    $userid=$_SESSION['user_id'];
    $output="";
    if($password === $cpassword)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        //check if record already present
        $get=$db->prepare ("SELECT COUNT(*) AS num FROM users WHERE uid = ?");
        $get->execute(array($userid));
        //Fetch the row / result.
        $row = $get->fetch(PDO::FETCH_ASSOC);
        //If num is bigger than 0, the email already exists.
        if($row['num'] > 0)
        {

            //update Profile
            $get=$db->prepare ("UPDATE users SET password=?  WHERE uid = ?");
            $get->execute(array($hash,$userid));
            $output="Your Password Updated Successfully";
        }

        $_SESSION['profile_msg']=$output;
        header("Location: ../../account.php?page=pass");
    }
    else
    {
        $output =" Password does not match";
        $_SESSION['profile_msg']=$output;
        header("Location: ../../account.php?page=pass");
    }


}
?>