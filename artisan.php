<?php
    echo '<pre>';
    echo shell_exec('/opt/alt/php83/usr/bin/php artisan optimize:clear');
    echo '</pre>';
?>