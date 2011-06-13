<?php

class User_model extends CI_Model {

    function register_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function verify_user($email, $password)
    {
        $q = $this
            ->db
            ->where('email', $email)
            ->where('password', sha1($password))
            ->limit(1)
            ->get('users');

        if ( $q->num_rows > 0 ) {
            // person has account with us
            return $q->row();
        }
        return false;
    }

    public function is_admin($email)
    {
        $q = $this->db
            ->where('email', $email)
            ->select('user_type')
            ->limit(1)
            ->where('user_type', 1)
            ->get('users');
        if ( $q->num_rows > 0 )
            return TRUE;
        else
            return FALSE;
    }
}	
