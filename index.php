<?php
fwrite(fopen('dashboard/ip.json','w'),json_encode(['ip' => $_SERVER['REMOTE_ADDR']]));
header('Location: https://www.google.com');