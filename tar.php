<?php

// Disabled timeout
set_time_limit( 0 );
// Reporting all errors
error_reporting( E_ALL );

ob_implicit_flush( TRUE );

// Memory set to 1GB
ini_set( 'memory_limit' , '1024M' );

// Exec shell comand
exec( "tar -cvf backup_v20160715.tar /home/.../html/" );

?>