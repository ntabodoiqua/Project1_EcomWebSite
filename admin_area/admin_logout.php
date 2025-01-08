<?php
session_unset();
session_destroy();
echo "<script>window.open('../index.php', '_self')</script>";
?>