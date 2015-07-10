<?php

define("SITE_NAME", "localhost/phpvsf/");

define("PATH", __DIR__);

define("DEBUG", true);

define("APPLICATION_NAME", "phpvsf");

define("LEVELS_FROM_DOCUMENT_ROOT", 1);

////////////////////////////////////////////
//DATABASE CONFIGURATION
////////////////////////////////////////////
define("DB_TYPE", "mysql");
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "pdotest");
define("DB_FQDN", DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME);
define("DB_USER", "root");
define("DB_PASSWORD", "");

