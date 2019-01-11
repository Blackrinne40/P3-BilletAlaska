<?php

require_once ('./Model/model.php'); 

class PostClass extends Model {

	private $id;
	private $author;
	private $title;
	private $content;
	private $creation_date; 
	private $textresum;

	public function __construct($donnees){
		$this-> hydrate($donnees);
	}

	public function getId(){
		return $this ->id;
	}

	public function getAuthor(){
		return $this ->author;
	}

	public function getTitle(){
		return $this ->title;
	}

	public function getContent(){
		return $this ->content;
	}
	public function getCreation_date(){
		return $this ->creation_date;
	}
	public function getTextResum(){
		return $this->textresum;
	}


	public function setId($id){
		$this->id = $id;
	}
	public function setAuthor($author){
		$this->author = $author;
	}
	public function setTitle($title){
		$this->title = $title;
	}
	public function setContent($content){
		$this->content = $content;
	}
	public function setCreation_date($creation_date){
		$this->creation_date = $creation_date;
	}
	public function setTextResum($textresum){
		$this->textresum = $textresum;
	}
}