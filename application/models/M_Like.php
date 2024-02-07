<?php

class M_Like extends CI_Model
{
    public function getDatalike()
    {
        $this->db->select('*');
        $this->db->from('tbl_like');
        $query = $this->db->get();
        return $query->result();
    }

    public function InsertDatalike($data)
    {
        $this->db->insert('tbl_like', $data);

        // Periksa apakah penyisipan berhasil
        if ($this->db->affected_rows() > 0) {
            // Penyisipan berhasil, kembalikan ID baris yang baru saja disisipkan
            return $this->db->insert_id();
        } else {
            // Penyisipan gagal, kembalikan -1 atau nilai lainnya sebagai penanda kesalahan
            return -1;
        }
    }
    public function UpdateDatalike($data, $like_id)
    {
        $this->db->where('like_id', $like_id);
        $this->db->update('tbl_like', $data);
    }

    public function getDatalikeDetail($like_id)
    {
        $this->db->where('like_id', $like_id);
        $query = $this->db->get('tbl_like');
        return $query->row();
    }
    public function DeleteDatalike($like_id)
    {
        $this->db->where('like_id', $like_id);
        $this->db->delete('tbl_like');
    }
    public function like($foto_id)
    {
        // Ambil user_id dari sesi
        $user_id = $this->session->userdata('user_id');

        // Pastikan user_id tersedia
        if ($user_id) {
            $data = array(
                'foto_id' => $foto_id,
                'user_id' => $user_id,
                'tanggal_like' => date('Y-m-d H:i:s') // Tanggal dan waktu saat ini
            );

            // Insert data ke dalam tabel tbl_like
            $this->db->insert('tbl_like', $data);
        } else {
            // Jika user_id tidak tersedia, Anda dapat menangani sesuai kebutuhan
            show_error('User not logged in.');
        }
    }
    public function likeh($foto_id,$user_id)
    {
        // Ambil user_id dari sesi
        $user_id = $this->session->userdata('user_id');

        // Pastikan user_id tersedia
        if ($user_id) {
            $data = array(
                'foto_id' => $foto_id,
                'user_id' => $user_id,
                'tanggal_like' => date('Y-m-d H:i:s') // Tanggal dan waktu saat ini
            );

            // Insert data ke dalam tabel tbl_like
            $this->db->insert('tbl_like', $data);
        } else {
            // Jika user_id tidak tersedia, Anda dapat menangani sesuai kebutuhan
            show_error('User not logged in.');
        }
    }
    
    public function getLikeCount($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get('tbl_like');
        return $query->num_rows();
    }
    public function unlike($foto_id, $user_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_like');
    }
    public function unlikeh($foto_id, $user_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_like');
    }
    public function isLiked($foto_id, $user_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_like');

        return $query->num_rows() > 0;
    }


}