<?php
    
    function validate_email($email=NULL) {
    return (preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/",$email) ? "$email adalah valid" : "$email adalah invalid");

    echo validate_email("kukuruyuk@gmail.com");
    echo "<br/>" . validate_email("kuk.uruyuk@gmail");
    

    function validate_username($name){
         return (preg_match("/^[a-z]{8}$/",$name)? "$name adalah valid" : "$name invalid");
        }
        echo "<br/>" . validate_username("vladimi");
        echo "<br/>" . validate_username("vladimir");
?>
