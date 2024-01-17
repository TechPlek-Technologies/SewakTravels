<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Blogs_model extends CI_Model
{

    function get_blogs($id = FALSE){
        if($id === FALSE){
            $this->db->where('blog_status', '1');
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('tbl_blogs');
            return $query->result_array();
        }
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_blogs');
        return $query->row_array();
        
    }

    function addNewBlog($savedata)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_blogs', $savedata);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }
    function updateBlog($id,$savedata)
    {
        $this->db->trans_start();
        $this->db->where('id',$id);
        $this->db->update('tbl_blogs', $savedata);        
                
        $this->db->trans_complete();        
        return true;
    }
    function deleteblog($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_blogs');
        return true;
    }
    function checkblogExist($title, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_blogs");
		// $this->db->where('isDeleted', 0);
        $this->db->where("title", $title);
		
		if($id != 0){
            $this->db->where("id !=", $id);
        }
		
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

}