<?php

class M_Komen extends CI_Model
{
    public function getDatakomen()
    {
        $this->db->select('*');
        $this->db->from('tbl_komen');
        $query = $this->db->get();
        return $query->result();
    }
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

    public function getDataComment($foto_id)
    {
        $this->db->select('foto_user, username, isi_komen, tgl_komen');
        $this->db->from('tbl_komen');
        $this->db->where('foto_id', $foto_id);

        $query = $this->db->get();
        return $query->result();
    }

    public function getCommentCount($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get('tbl_komen');
        return $query->num_rows(); // Mengembalikan jumlah baris (jumlah komentar) dari hasil query
    }

    public function DeleteDatakomen($komen_id)
    {
        $this->db->where('komen_id', $komen_id);
        $this->db->delete('tbl_komen');
    }
    public function getKomentarById($komen_id)
    {
        $this->db->where('komen_id', $komen_id);
        $query = $this->db->get('tbl_komen');
        return $query->row(); // Mengembalikan satu baris hasil query
    }

    public function count_komen()
    {
        return $this->db->count_all_results('tbl_komen');
    }
}
