<?php
$mysqli = new mysqli("localhost", "u0663678_default", "keANP!q7", "u0663678_default");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* check if server is alive */
if ($mysqli->ping()) {
    printf ("Our connection is ok!\n");
    $mysqli->set_charset("utf8");
    $sql = 'INSERT INTO user_requests (name, email) VALUES ("1","2")';
    $mysqli->query($sql);
} else {
    printf ("Error: %s\n", $mysqli->error);
}
$sql = 'INSERT INTO `u0663678_default`.` user_requests` (`id`, `name`, `email`) VALUES (NULL, \'Alexey\', \'yopii.main@gmail.com\');';
$mysqli->query($sql);
/* close connection */
$mysqli->close();
?>