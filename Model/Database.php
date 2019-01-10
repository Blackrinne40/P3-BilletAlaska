<?php

class Database {
	protected $db;

	public function __construct(){	
		
		try
        {
            $this-> db=new PDO('mysql:host=sql211.hebergratuit.net;dbname=heber_22572415_BilletAlaska;charset=utf8', 'heber_22572415', '4a39T7Nfgx');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

}