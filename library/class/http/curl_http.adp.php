<?php

class curl_http extends http
{
	public function __construct()
	{
		$this->useCurl(true);
	}
}

APP::load_file('http', 'cls');

?>
