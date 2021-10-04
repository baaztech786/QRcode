<?php
include "../../config/config.php";
include "../../functions.php";
if(file_exists('../../vendor/phpqrcode/qrlib.php'))
{
    include('../../vendor/phpqrcode/qrlib.php');
}
if(isset($_POST['add_link']))
{


    $name=check_input_data($_POST['name']);
    $dob=check_input_data($_POST['dob']);
    $phnumber=check_input_data($_POST['phnumber']);
    $fdate=check_input_data($_POST['fdate']);
    $sdate=check_input_data($_POST['sdate']);
    $country=check_input_data($_POST['country']);
    $lang=check_input_data($_POST['lang']);

    $_SESSION['link_name'] = $name;
    $_SESSION['link_dob'] = $dob;
    $_SESSION['link_phnumber'] = $phnumber;
    $_SESSION['link_fdate'] = $fdate;
    $_SESSION['link_sdate'] = $sdate;

    // validation
    if(!isset($name) || empty($name))
    {
        $_SESSION['product_msg']="Name Can not be Empty";

        header("Location: ../../links.php?page=add");
    }
    else if(!isset($dob) || empty($dob))
    {
        $_SESSION['product_msg']="please select your DOB";

        header("Location: ../../links.php?page=add");
    }
    else if(!isset($phnumber) || empty($phnumber))
    {
        $_SESSION['product_msg']="please Enter your Personal Health Number";

        header("Location: ../../links.php?page=add");
    }
    else if(!isset($fdate) || empty($fdate))
    {
        $_SESSION['product_msg']="please select your First Vaccination Date";

        header("Location: ../../links.php?page=add");
    }
    else if(!isset($sdate) || empty($sdate))
    {
        $_SESSION['product_msg']="please select your Second Vaccination Date";

        header("Location: ../../links.php?page=add");
    }
    else if(empty($country))
    {
        $_SESSION['product_msg']="please select your Country";

        header("Location: ../../links.php?page=add");
    }
    else if(empty($lang))
    {
        $_SESSION['product_msg']="please select your Language";

        header("Location: ../../links.php?page=add");
    }
    else
    {
        $ok = 0;
        $url="";
        $qrcode="";
        $slug="";
        $output="";
        $get=$db->prepare ("INSERT INTO record (name,dob,p_health_no,f_vac_date,s_vac_date,country,lang,url,slug,qrcode) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $get->execute(array($name,$dob,$phnumber,$fdate,$sdate,$country,$lang,$url,$qrcode,$slug));
        $last_id=$db->lastInsertId();
        // here goes qrcode generation


        $tempDir = '../../uploads/qrcode/';

        $code= md5($last_id);
        $codeContents = 'http://localhost/Link_Project/record.php?code='.$code.'';

        // we need to generate filename somehow,
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = 'qrcode_file_'.md5($codeContents).'.png';

        $pngAbsoluteFilePath = $tempDir.$fileName;

        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);
            echo 'File generated!';
            $get=$db->prepare ("UPDATE record SET url=?, slug=?,qrcode=? ");
            $get->execute(array($codeContents,$code,$fileName));
            $ok=1;
        } else {

            $_SESSION['product_msg']='File already generated!';
            header("Location: ../../links.php?page=add");
        }


        if($ok == 1)
        {
            $output=" ".$name."'s Data Added Successfully";
            $_SESSION['link_name'] = "";
			$_SESSION['link_dob'] = "";
		    $_SESSION['link_phnumber'] = "";
        	$_SESSION['link_fdate'] = "";
			$_SESSION['link_sdate'] = "";

            $_SESSION['product_msg']=$output;
            header("Location: ../../links.php?page=add");
        }
    }

}

