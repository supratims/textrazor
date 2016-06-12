<?php

require_once('TextRazor.php');

class Parser {
	private $textrazor;
	function __construct(){
		$keys = parse_ini_file(__DIR__ . '/app.keys');
		$api_key = $keys['api.key'];
		$this->textrazor = new TextRazor($api_key);
	}

	public function getEntities($text){
		$this->textrazor->addExtractor('entities');
		$response = $this->textrazor->analyze($text);
		$entities = [];
		if (isset($response['response']['entities'])) {
			foreach ($response['response']['entities'] as $entity) {
				$entities[] = $entity['entityId'];
			}
		}
		return $entities;
	}


}