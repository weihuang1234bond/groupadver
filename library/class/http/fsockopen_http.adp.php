<?php

class fsockopen_http extends http
{
	public function __construct()
	{
		parent::__construct();
		$this->useCurl(false);
	}
}

APP::load_file('http', 'cls');

?>
