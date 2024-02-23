<?php

class M_Foto extends CI_Model
{
    public function getDatafoto()
    {
        $this->db->select('tbl_foto.*, tbl_user.username, tbl_user.email, tbl_user.namalengkap, tbl_user.alamat, tbl_album.nama_album');
        $this->db->from('tbl_foto');
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_foto.user_id', 'inner');
        $this->db->join('tbl_album', 'tbl_album.album_id = tbl_foto.album_id', 'inner');
        $query = $this->db->get();

        return $query->result();
    }

    public function InsertDatafoto($data)
    {
        $this->db->insert('tbl_foto', $data);
    }
    public function UpdateDatafoto($foto_id, $data)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->update('tbl_foto', $data);
    }

    public function getDatafotoDetail($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get('tbl_foto');
        return $query->row();
    }
    public function DeleteDatafoto($foto_id)
    {
        $this->db->where('foto_id', $foto_id);
        $this->db->delete('tbl_foto');
    }
    public function get_foto_by_id($foto_id)
    {
        // Fetch user data based on user_id
        return $this->db->get_where('tbl_foto', array('foto_id' => $foto_id))->row();
    }
    public function is_valid_foto($foto_id)
    {
        // Ambil data foto berdasarkan $foto_id
        $this->db->where('foto_id', $foto_id);
        $query = $this->db->get('tbl_foto');

        // Periksa apakah foto dengan $foto_id ditemukan
        if ($query->num_rows() > 0) {
            return true; // $foto_id valid
        } else {
            return false; // $foto_id tidak valid
        }
    }
    public function getFotoByIdUser($user_id)
    {
        // Sesuaikan dengan nama tabel dan kolom pada database Anda
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('tbl_foto');

        // Kembalikan hasil query
        return $query->result();
    }


    public function searchData($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_foto');
        $this->db->like('judul_foto', $search);
        $query = $this->db->get();

        return $query->result();
    }
    public function get_foto_by_album($album_id) {
        $this->db->select('*');
        $this->db->from('tbl_foto');
        $this->db->where('album_id', $album_id);
        $query = $this->db->get();
        return $query->result();
    }
    

    public function count_foto()
    {
        return $this->db->count_all_results('tbl_foto');
    }
    // Contoh implementasi di dalam model (M_Foto)
    public function getDatafotoByAlbumId($album_id)
{
    $this->db->where('album_id', $album_id);
    return $this->db->get('foto')->result();
}
public function get_album_id_by_foto($foto_id) {
    // Query database untuk mendapatkan album_id berdasarkan foto_id
    $this->db->select('album_id');
    $this->db->from('tbl_foto');
    $this->db->where('foto_id', $foto_id);
    $query = $this->db->get();
    $result = $query->row();
    if ($result) {
        return $result->album_id;
    } else {
        return false;
    }
}


}