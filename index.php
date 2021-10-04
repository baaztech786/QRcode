<?php
//Include page Start Section
include "template_parts/page_start.php";

//Include page Navbar
include "template_parts/page_nav.php";
?>

        <div id="layoutSidenav">
            <?php
                //Include page Side Navbar
                include "template_parts/page_sidenav.php";
            ?>
            <div id="layoutSidenav_content">

                <?php

                    //include page Content
                    include "template_parts/home.php";

                    //include page footer
                    include "template_parts/page_footer.php";
                ?>
            </div>
        </div>
    <!-- include Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/scripts.js"></script>
</body>
</html>