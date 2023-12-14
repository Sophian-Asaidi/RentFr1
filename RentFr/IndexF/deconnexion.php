<?php

session_start();

session_unset();

session_destroy();

header("refresh:2; url=index.html");
exit();
header("Location: index.html");
exit();
?>
