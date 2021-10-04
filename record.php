<?php
//include config.php
include 'config/config.php';
include 'functions.php';
    $code = check_input_data($_GET['code']);
    $get=$db->prepare("SELECT * FROM record where slug=?");
    $get->execute(array($code));
    $record=$get->fetchAll(PDO::FETCH_ASSOC);
    // vars
    $name="";
    $dob="";
    $phno="";
    $fdate="";
    $sdate="";
    $country="";
    $lang="";
    if($get->rowCount() > 0) //check record exists
    {
        foreach ($record as $key => $value)
        {
            $name=$value['name'];
            $dob=$value['dob'];
            $phno=$value['p_health_no'];
            $fdate=$value['f_vac_date'];
            $sdate=$value['s_vac_date'];
            $country=$value['country'];
            $lang=$value['lang'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Include CSS Files -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/front.css">
    <title>QRcode- Data</title>
</head>
<body style="background-color: grey;">

    <!-- container -->
    <div class="container-fluid">
        <div class="row m-5 " id="google_translate_element" >
            <div class="col-md-2"></div>
            <div class="col-md-8" style="background-color: #fff;">
                <img src="assets/img//logo1.jpg" style="width: 150px; height:100px;" alt="logo">
                    <span style="text-align: center;">Institute of Public Health of Serbia "DR Milan jovanovic Batut"</span>

                              <div class="align-center">
                                  <p style="text-align: center;"><b>Name</b> : <?Php echo $name ?> <br></p>
                                  <p style="text-align: center;"><b>DOB</b> : <?Php echo $dob; ?> <br></p>
                                  <p style="text-align: center;"><b>Personal Health No</b> : <?Php echo $phno; ?> <br></p>
                                  <p style="text-align: center;"><b>1st Vaccination Date</b> : <?Php echo $fdate; ?> <br></p>
                                  <p style="text-align: center;"><b>2nd Vaccination Date</b> : <?Php echo $sdate; ?> <br></p>
                                  <p style="text-align: center;"><b>Country</b> : <?Php echo $country; ?> <br></p>
                                  <p style="text-align: center;"><b>Languages</b> : <?Php echo $lang; ?> <br></p>
                              </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'ru'}, 'google_translate_element');
        }
    </script>



    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- include Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>