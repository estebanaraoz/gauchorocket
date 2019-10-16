<?php

function getConfigAsArray(){
    return parse_ini_file($_SERVER["DOCUMENT_ROOT"].'/config/config.ini', true);
}
