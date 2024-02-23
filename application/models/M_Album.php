<?php

class M_Album extends CI_Model
{
    public function getDataalbum()
    {
        $this->db->select('tbl_album.*, tbl_user.username');
        $this->db->from('tbl_album');
        $this->db->join('tbl_user', 'tbl_album.user_id = tbl_user.user_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function InsertDataalbum($data)
    {
        $this->db->insert('tbl_album', $data);

        // Periksa apakah penyisipan berhasil
        if ($this->db->affected_rows() > 0) {
            // Penyisipan berhasil, kembalikan ID baris yang baru saja disisipkan
            return $this->db->insert_id();
        } else {
            // Penyisipan gagal, kembalikan -1 atau nilai lainnya sebagai penanda kesalahan
            return -1;
        }
    }
    public function UpdateDataalbum($album_id, $data)
    {
        $this->db->where('album_id', $album_id);
        $this->db->update('tbl_album', $data);
    }

    public function getDataalbumDetail($album_id)
    {
        $this->db->where('album_id', $album_id);
        $query = $this->db->get('tbl_album');
        return $query->row();
    }
    public function DeleteDataalbum($album_id)
    {
        $this->db->where('album_id', $album_id);
        $this->db->delete('tbl_album');
    }

    public function getUser()
    {
        $this->db->select('user_id, username');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_album_by_id($album_id)
    {
     // Fetch user data based on user_id
      return $this->db->get_where('tbl_album', array('album_id' => $album_id))->row();
    }

    public function count_album() {
        return $this->db->count_all_results('tbl_album');
    }
}