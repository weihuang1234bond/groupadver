<?php

class paylog_mod extends app_models
{
	public $default_from = 'paylog';

	public function get_list()
	{
		$this->where(array('uid' => $_SESSION['affiliate']['uid']));
		$this->order_by('id');
		$this->pager();
		$data = $this->get();
		return $data;
	}
}


?>
