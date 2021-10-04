<?php
include "../../config/config.php";
include "../../functions.php";
if(isset($_POST['user_profile']))
{
    $fname=check_input_data($_POST['username']);
    $lname=check_input_data($_POST['email']);

    $userid=$_SESSION['user_id'];
    $output="";
    //check if record already present
    $get=$db->prepare ("SELECT COUNT(*) AS num FROM users WHERE uid = ?");
    $get->execute(array($userid));
    //Fetch the row / result.
    $row = $get->fetch(PDO::FETCH_ASSOC);
    //If num is bigger than 0, the email already exists.
    if($row['num'] > 0)
    {
        //update Profile
        $get=$db->prepare ("UPDATE users SET username=? , email=?  WHERE uid = ?");
        $get->execute(array($fname,$lname,$userid));
        $output="Your Profile Updated Successfully";
        $_SESSION['username'] = $fname;
        $_SESSION['email'] = $lname;
    }

    $_SESSION['profile_msg']=$output;
    header("Location: ../../account.php?page=basic");
}
?>