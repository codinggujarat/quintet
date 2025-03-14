<?php
function generateGiftCardCode($length = 12) {
    return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, $length));
}
?>
