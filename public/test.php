<?php
echo __DIR__;
echo '<br> ';

echo realpath(__DIR__);

define('BASE_PATH',realpath(__DIR__.'/../../'));

echo BASE_PATH;