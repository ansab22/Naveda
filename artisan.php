<?php
    echo '<pre>';
    echo shell_exec('/opt/alt/php83/usr/bin/php artisan storage:link 2>&1');
    echo '</pre>';
?>