<?php

class Site_model extends CI_Model {
	
	function get_records()
	{
		$query = $this->db->get('site');
		return $query->result();
	}
	
	function get_inactive_records()
	{
		$query = $this->db->where('state', 'inactive')->get('site');
		return $query->result();
    }

	function get_one_record($id)
	{
        $query = $this->db
            ->limit(1)
            ->where('id',$id)
            ->get('site');
		return $query->row();
	}
	
	function get_random_site($data)
    {
        $this->db->where_in('category', $data['cats']);
        $this->db->where_in('domain', $data['doms']);
		$this->db->order_by("id","random");
		$this->db->limit(1);
		$query = $this->db->get_where('site', array('state' => 'active'));
		
		return $query->row();
	}
	
	function add_record($data) 
	{
		$this->db->insert('site', $data);
		return;
	}
	
	function update_record($data, $id) 
	{
        $this->db
            ->where('id',$id)
		    ->update('site', $data);
	}
	
	function delete_row($row_id)
	{
        $this->db
            ->where('id', $row_id)
		    ->delete('site');
	}
    function add_category($data)
    {
        $this->db
            ->insert('category', $data);
        return;    
    }
    function get_categories()
    {
        $query = $this->db->get('category');
        $q = $query->result();

        foreach ($q as $doma)
            $data[$doma->id] = $doma->name;
        return $data;
    }
    function get_domains()
    {
        $query = $this->db->get('domain');
        $q = $query->result();

        foreach ($q as $doma)
            $data[$doma->id] = $doma->name;
        return $data;
    }    

    function is_active($site_id)
    {
        $q = $this->db
                ->where('id', $site_id)
                ->limit(1)
                ->get('site');
        if ($q->num_rows > 0) return 1;
        return 0;
    }

    function user_likes($mail, $site_id, $type)
    {
        $query = $this->db
            ->where('user_email',$mail)
            ->where('site_id', $site_id)
            ->where('type', $type)
            ->limit(1)
            ->get('user_likes');

        if ($query->num_rows > 0)
            return 1;
        return 0;
    }

    function user_thinks($mail, $site_id, $type)
    {
        $data = array(
            'user_email' => $mail,
            'site_id' => $site_id,
            'type' => $type
        );
        $this->db->insert('user_likes', $data);
        $q = $this->get_one_record($site_id);
        if ($type == 'edu')
            $q->educative++;
        else
            $q->entertainment++;

        $data = array(
            'entertainment' => $q->entertainment,
            'educative' => $q->educative
        );
        $this->db
            ->where('id', $site_id)
            ->update('site', $data);

    }
}
