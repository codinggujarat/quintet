<?php
session_start();
unset($_SESSION['show_toggle']);
echo "Session cleared after 1 minute.";
header("Location: payment-method.php");