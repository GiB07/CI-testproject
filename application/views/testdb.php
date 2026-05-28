<?php

$conn = mysqli_connect(
    "sql312.byetcluster.com",
    "epiz_12345678",
    "yourpassword",
    "epiz_12345678_ebs"
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "CONNECTED SUCCESSFULLY";
?>