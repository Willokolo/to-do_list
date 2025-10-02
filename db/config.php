<!-- this page is for centralize the credencials (Host, user, password, db), utilize PDO -->
<?php

// ---Config the Data Base ---

$host    = 'localhost';  //host the db
$name    = 'to-do_list'; //the name of db
$user    = 'root';       //user of db
$pass    = '';           //password, not necessery
$charset = 'utf8mb4';    //Characters set, suport all unicode

// --- DSN and OPTIONS ---

$dsn = "mysql:host={$host}; dbname={$name}; charset={$charset}";
// Data Source Name, string that tells PDO how to connect: db type, name and charset
// Replace with the variabels values

$option =  [
// Config how the php tells wit the db, rules of the conection

PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION, 
// Thells how PDO report db erros, silently or returns warning
PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC, 
// Return data like a associative array
PDO::ATTR_EMULATE_PREPARES    => false, 
//Controls whether PDO uses native prpared statements from MySQl, optimize and protect against SQL INJECTION
];

try {

    $pdo = new PDO($dsn, $user, $pass, $option);

} catch (PDOException $e){

    error_log("DataBase Connection Error: " . $e ->getMessage()); 
    // Display the real error message ina log file, dont display this for users
    exit('Connetion error in Data Base, contact the admin.');
}

?>