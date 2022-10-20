<?php
$cookie_name = "pivot_config3";

if ( isset( $_POST['config_copy'])) {
    $cookie_value = $_POST['config_copy'];
    setcookie($cookie_name, $cookie_value, time()+3600, "/");

    //cookie check function
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
}
else {
  if ( isset( $_COOKIE[$cookie_name] ) ) {
    echo $_COOKIE[$cookie_name];
  }
}
?>