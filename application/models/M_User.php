<?php

class M_User extends CI_Model
{
    public function getDatauser()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }
   
    public function InsertDatauser($data)
    {
        $this->db->insert('tbl_user', $data);

        // Periksa apakah penyisipan berhasil
        if ($this->db->affected_rows() > 0) {
            // Penyisipan berhasil, kembalikan ID baris yang baru saja disisipkan
            return $this->db->insert_id();
        } else {
            // Penyisipan gagal, kembalikan -1 atau nilai lainnya sebagai penanda kesalahan
            return -1;
        }
    }
    public function UpdateDatauser($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $data);
    }

    public function getDatauserDetail($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }
    public function DeleteDatauser($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_user');
    }
    public function get_user_by_email($email)
    {
        return $this->db->where('email', $email)->get('tbl_user')->row();
    }
    public function get_user_by_id($user_id)
    {
     // Fetch user data based on user_id
      return $this->db->get_where('tbl_user', array('user_id' => $user_id))->row();
    }
    public function getUserById($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_user');

        return $query->row_array();
    }

}