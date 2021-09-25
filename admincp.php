<?php

require 'assets/init.php';

if (IS_LOGGED == false || PT_IsAdmin() == false) {
	header("Location: " . PT_Link(''));
    exit();
}
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
    	if (!is_array($value)) {
            $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
            $_GET[$key] = strip_tags($value);
        }
        else{
            foreach ($value as $keyv => $valuev) {
                $valuev = preg_replace('/on[^<>=]+=[^<>]*/m', '', $valuev);
                $value[$keyv] = strip_tags($valuev);
            }
            $_GET[$key] = $value;
        }
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
    	if (!is_array($value)) {
            $value = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
            $_POST[$key] = strip_tags($value);
        }
        else{
            foreach ($value as $keyv => $valuev) {
                $valuev = preg_replace('/on[^<>=]+=[^<>]*/m', '', $valuev);
                $value[$keyv] = strip_tags($valuev);
            }
            $_POST[$key] = $value;
        }
    }
}

// autoload admin panel files
require 'admin-panel/autoload.php';