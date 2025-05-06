<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_welcome', 'model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index($id = FALSE)
    {
        if ($id === FALSE) {
            $data['home_post'] = $this->model->read();  
            $this->load->view('header');
            $this->load->view('home', $data);
            $this->load->view('footer');
        } else {
            $data['post'] = $this->model->read($id);  
            $this->load->view('header');
            $this->load->view('post', $data);
            $this->load->view('footer');
        }
    }

    public function create($id = false)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Validasi form
        $this->form_validation->set_rules('judul', 'Title', 'required|max_length[30]');
        $this->form_validation->set_rules('rating', 'Rating', 'required|max_length[4]');
        $this->form_validation->set_rules('tahun', 'Year', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('genre', 'Genre', 'required');
        $this->form_validation->set_rules('trailer_url', 'Trailer URL', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('create');
            $this->load->view('footer');
        } else {
            $id = uniqid('movie_', TRUE);

            $config['upload_path'] = './upload/post';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '100000';
            $config['file_ext_tolower'] = TRUE;
            $config['file_name'] = str_replace('.', '_', $id);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('cover')) {  
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('welcome/index/create');
            } else {
                $filename = $this->upload->data('file_name');
                $this->model->create($id, $filename); 
                redirect('');
            }
        }
    }

    public function update($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Title', 'required|max_length[30]');
        $this->form_validation->set_rules('rating', 'Rating', 'required|max_length[4]');
        $this->form_validation->set_rules('tahun', 'Year', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('genre', 'Genre', 'required');
        $this->form_validation->set_rules('trailer_url', 'Trailer URL', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['post'] = $this->model->read($id);  // Menampilkan data film untuk diupdate
            $this->load->view('header');
            $this->load->view('update', $data);
            $this->load->view('footer');
        } else {
            $this->model->update($id);  // Memperbarui data film

            if ($this->input->post('cover')) {
                // Proses untuk mengupdate cover jika ada file baru
                $post = $this->model->read($id);
                $config['upload_path'] = './upload/post';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1000000';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $post->cover;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('cover')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('welcome/update/' . $id);
                } else {
                    $this->model->update($id);  // Update data setelah upload cover
                    redirect('welcome');
                }
            }
            redirect('welcome');
        }
    }

    public function delete($id)
    {
        $post = $this->model->read($id);
        $this->model->delete($id);  // Hapus data film

        unlink('upload/post/' . $post->cover);  // Hapus gambar cover dari folder
        redirect('welcome');
    }

    public function deleteAll()
    {
        $this->model->deleteAll();  // Hapus semua data film
        $directory = 'upload/post/';

        $files = glob($directory . '*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);  // Hapus semua file gambar cover
            }
        }

        redirect('welcome');
    }
}
?>
