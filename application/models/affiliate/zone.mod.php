<?php

class zone_mod extends app_models
{
	public $default_from = 'zone';

	public function get_list($plantype = false, $page = false, $get_size = false, $get_tplid = false, $zoneid = false)
	{
		if ($plantype) {
			$this->where('plantype', $plantype);
		}

		if ($get_tplid) {
			$this->where('adtplid', $get_tplid);
		}

		if ($get_size) {
			$e = explode('x', $get_size);
			$this->where('width', $e[0]);
			$this->where('height', $e[1]);
		}

		if ($zoneid) {
			$this->where('zoneid', $zoneid);
		}

		$this->where('uid', $_SESSION['affiliate']['uid']);
		$this->order_by('zoneid');

		if ($page) {
			$this->pager();
		}

		$data = $this->get();
		return $data;
	}

	public function get_all()
	{
		$this->where('uid', $_SESSION['affiliate']['uid']);
		$this->order_by('zoneid');
		$data = $this->get();
		return $data;
	}

	public function create_post()
	{
		$specs = post('specs');
		$wh = explode('x', $specs);
		$data = array('uid' => (int) $_SESSION['affiliate']['uid'], 'zonename' => post('zonename'), 'plantype' => post('plantype'), 'width' => (int) $wh[0], 'height' => (int) $wh[1], 'adstyleid' => (int) post('styleid'), 'adtplid' => (int) post('adtplid'), 'viewtype' => (int) post('viewtype'), 'viewadsid' => '' . @implode(',', post('viewadsid')) . '', 'codestyle' => json_encode(post('color')), 'htmlcontrol' => serialize(post('a_h')), 'addtime' => DATETIMES);
		$this->set($data);
		$this->insert();
		return $this->get_insert_id();
	}

	public function edit_post()
	{
		$where = array('zoneid' => (int) post('zoneid'), 'uid' => $_SESSION['affiliate']['uid']);
		$data = array('zonename' => post('zonename'), 'adstyleid' => (int) post('styleid'), 'viewtype' => (int) post('viewtype'), 'viewadsid' => @implode(',', post('viewadsid')), 'codestyle' => json_encode(post('color')), 'htmlcontrol' => serialize(post('a_h')), 'uptime' => DATETIMES);
		$this->where($where);
		$this->set($data);
		$data = $this->update();
	}

	public function del($zoneid)
	{
		$where = array('zoneid' => (int) $zoneid, 'uid' => $_SESSION['affiliate']['uid']);
		$this->where($where);
		$data = $this->delete();
	}

	public function get_one($id)
	{
		$where = array('zoneid' => (int) $id);
		$this->where($where);
		$data = $this->find_one();
		return $data;
	}
}


?>
