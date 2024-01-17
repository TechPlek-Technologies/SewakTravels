<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model
{

    function getHomePageList()
    {
        $this->db->select('*');
        $this->db->from('tbl_home_page');
        $query = $this->db->get();
        
        return $query->result();
    }
    function editHomePage($data)
    {
        $this->db->where('id', 1);
        $this->db->update('tbl_home_page', $data);

        //$this->db->affected_rows();
        return TRUE;
    }
	
	function getPageList($page_type)
    {
        $this->db->select('id, heading, description, page_type');
		$this->db->where('page_type', $page_type);
        $this->db->from('tbl_page');
        $query = $this->db->get();
        
        return $query->result();
    }
	function editPage($page_type, $data)
    {
        $this->db->where('page_type', $page_type);
        $this->db->update('tbl_page', $data);

        //$this->db->affected_rows();
        return TRUE;
    }
}

  