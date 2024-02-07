<?php

class M_Komen extends CI_Model
{
    public function getCommentsByFotoId($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get('tbl_komen');
        return $query->result();
    }

    public function insertComment($data)
    {
        $this->db->insert('tbl_komen', $data);
    }
    // Di dalam model, misalnya M_Komentar.php
    public function getCommentsWithUserInfo($foto_id)
    {
        $this->db->select('tbl_komen.*, tbl_user.username, tbl_user.foto_user');
        $this->db->from('tbl_komen');
        $this->db->join('tbl_user', 'tbl_komen.user_id = tbl_user.user_id');
        $this->db->where('tbl_komen.foto_id', $foto_id);
        $this->db->order_by('tbl_komen.tgl_komen', 'desc');
    
        $query = $this->db->get();
        return $query->result();
    }
    

    // In your M_Comment model
    public function getDataComment($foto_id)
    {
        // Your existing query logic to retrieve comments
        // Make sure to include 'foto_user' and 'username' in the SELECT statement

        $this->db->select('foto_user, username, isi_komen, tgl_komen');
        $this->db->from('tbl_komen');
        $this->db->where('foto_id', $foto_id);

        $query = $this->db->get();
        return $query->result();
    }

}
