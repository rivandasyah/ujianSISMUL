<?php
defined('BASEPATH') OR exit('No directed script access allowed');

class M_welcome extends CI_Model{
    public function create($id, $cover){
        $data = [
            'id' => $id,
            'judul' =>$this->input->post('judul', TRUE),
            'rating' =>$this->input->post('rating', TRUE),
            'tahun' =>$this->input->post('tahun', TRUE),
            'deskripsi' =>$this->input->post('deskripsi', TRUE),
            'genre' =>$this->input->post('genre', TRUE),
            'trailer_url' =>$this->input->post('trailer_url', TRUE),
            'cover'=> $cover
        ];
        $this->db->insert('post', $data);
    }

    public function read($id = FALSE){
        if ($id === FALSE){
            return $this->db->get('post')->result_array();
        }else{
            $query = $this->db->get_where('post', ['id' => $id]);
            return $query->row();
        }
    }
    
    public function update($id){
        $data = [
            'judul' =>$this->input->post('judul', TRUE),
            'rating' =>$this->input->post('rating', TRUE),
            'tahun' =>$this->input->post('tahun', TRUE),
            'deskripsi' =>$this->input->post('deskripsi', TRUE),
            'genre' =>$this->input->post('genre', TRUE),
            'trailer_url' =>$this->input->post('trailer_url', TRUE),
        ];
        $this->db->where('id', $id);
        $this->db->update('post', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('post');
    }

    public function deleteAll(){
        $this->db->empty_table('post');
    }
}

?>