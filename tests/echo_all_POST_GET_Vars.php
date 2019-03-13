<?php 

foreach ($_REQUEST as $key=>$value) {
    $$key = $value;
    echo  "<br>" . $value;
}


 ?>




