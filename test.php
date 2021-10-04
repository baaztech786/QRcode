<?php
 include ('vendor/phpqrcode/qrlib.php');

 $tempDir = 'uploads/qrcode/';

        $code= md5(1);
        $codeContents = 'http://localhost/Link_Project/record.php?code='.$code.'';

        // we need to generate filename somehow,
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = 'qrcode_file_'.md5($codeContents).'.png';

        $pngAbsoluteFilePath = $tempDir.$fileName;
        $url= 'uploads/qrcode/'.$fileName;

        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);
            echo 'File generated!';
            echo '<hr />';
            $ok=1;
        } else {
            echo 'File already generated! We can use this cached file to speed up site on common codes!';
            echo '<hr />';
        }
?>