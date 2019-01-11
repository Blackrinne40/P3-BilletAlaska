<?php

class Database {
	protected $db;

	public function __construct(){	
		
		try
        {
            //$this-> db=new PDO('mysql:host=localhost;dbname=billetalaska;charset=utf8', 'root', '');
            $this-> db=new PDO('mysql:host=localhost;dbname=id8439608_billetalaska;charset=utf8', 'id8439608_marinea', 'Biscotte40!!');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

}