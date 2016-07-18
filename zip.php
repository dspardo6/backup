<?php

// Disabled timeout
set_time_limit( 0 );
// Reporting all errors
error_reporting( E_ALL );

ob_implicit_flush( TRUE );

// Memory set to 1GB
ini_set( 'memory_limit' , '1024M' );

/**
 * @var Object Path to zip
 */
$rootPath = realpath( '/home/.../html/' );

/**
 * @var Object Instance zip file
 */
$zip = new ZipArchive();

/** Open zip file */
$zip->open( 'backup.zip' , ZipArchive::CREATE | ZipArchive::OVERWRITE );


$files = new RecursiveIteratorIterator(

    new RecursiveDirectoryIterator( $rootPath ) ,

    RecursiveIteratorIterator::LEAVES_ONLY

);


foreach ( $files as $name => $file ) {

    if ( !$file->isDir() ) {

        $filePath = $file->getRealPath();

        $relativePath = substr($filePath, strlen($rootPath) + 1);



        $zip->addFile($filePath, $relativePath);

    }
}

$zip->close();



?>