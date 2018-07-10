<?php

class DB {
   
    private static $objInstance;
    /*
     * Class Constructor - Create a new database connection if one doesn't exist
     * Set to private so no-one can create a new instance via ' = new DB();'
     */
    private function __construct() {}
   
    /*
     * Like the constructor, we make __clone private so nobody can clone the instance
     */
    private function __clone() {}
   
    /*
     * Returns DB instance or create initial connection
     * @param
     * @return $objInstance;
     */
    public static function getInstance(  ) {
           
        if(!self::$objInstance){
            self::$objInstance = new PDO(Config::get("DB_DSN"), Config::get("DB_USER"),  Config::get("DB_PASS"), array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));
            self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
       
        return self::$objInstance;
   
    } # end method
   
    /*
     * Passes on any static calls to this class onto the singleton PDO instance
     * @param $chrMethod, $arrArguments
     * @return $mix
     */
    final public static function __callStatic( $chrMethod, $arrArguments ) {
           
        $objInstance = self::getInstance();
       
        return call_user_func_array(array($objInstance, $chrMethod), $arrArguments);
       
    } # end method
   
   public static function catch_mysql_error($line) {
		$resFile = fopen ( 'mysql_errors.txt', 'a' );
		$strToWrite = date (" d . m . Y . H . i" ) . '::' . __FILE__ . '::' . $line . '::' . mysql_errno () . '::' . mysql_error () . '::' . $_SERVER ["REMOTE_ADDR"] . '::' . $_SERVER ["REQUEST_URI"] . "\n";
		fwrite ( $resFile, $strToWrite );
		fclose ( $resFile );
		echo '</br>Wystąpił błąd podczas pracy z bazą danych, i został on zgłoszony do administratora. Przepraszamy.';
	}
	
}
?>