<?php
    class Post extends CI_Controller{
        public function __construct(){
            Parent::__construct();
            $this->load->model('Post_model');
        }
        public function tambah()
        {
            if (logged_in()){
                $data['judul'] = "Tambah Post";

                // $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');
                // $this->form_validation->set_rules('stok', 'Stok', 'required');
                // $this->form_validation->set_rules('harga_modal', 'Harga Modal', 'required');
                // $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
                // $this->form_validation->set_rules('total_penjualan', 'Total Penjualan', 'required');

                if ($this->form_validation->run() == FALSE){
                    $this->load->view('templates/header', $data);
                    $this->load->view('post/tambah');
                    $this->load->view('templates/footer');
                } else {
                    $this->Post_model->tambahPost();
                    $this->session->set_flashdata('notif', 'ditambahkan');
                    $this->session->set_flashdata('alert', 'success');
                    $this->session->set_flashdata('tipe', 'berhasil');
                    redirect(base_url('post'));

                }
               
            } else {
                redirect('auth');
            }
            
        }
        public function prosesTambah(){
            
        	$this->Post_model->tambahPost();
            $this->tambah();
            echo "Sukses Menambahkan data";
        	//$this->index();
        }
        public function update($id){
        	$data['nama_brg'] = 'Update Post';
        	$data['post'] = $this->Post_model->getPostById($id);

        	$this->load->view('templates/header', $data);
        	$this->load->view('post/update', $data);
        	$this->load->view('templates/footer');
        }
        public function prosesUpdate($id){
        	$this->Post_model->updatePost($id);
        	redirect(base_url() . "post");
        }
        public function hapus($id){
        	$this->Post_model->hapusPost($id);
        	redirect(base_url() . "post");
        }
        public function index(){
         	$this->load->library('pagination');
            $config['full_tag_open'] ='<nav>
            <ul class="justify-content-center pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['attributes'] = ['class' => 'page-link'];


            $config['first_tag_open'] = '<li class="page-item">';
            //penutup untuk first page
            $config['first_tag_close'] = '</li>';

            //pembuka untuk last page
            $config['last_tag_open'] = '<li class="page-item">';
            //penutup untuk last page
            $config['last_tag_close'] = '</li>';

            //kata/hal yang ditampilin untuk 
            //next link
            $config['next_link'] = '&raquo';
            //pembuka untuk next-link
            $config['next_tag_open'] = '<li class="page-item">';
            //penutup untuk next-link
            $config['next_tag_close'] = '</li>';

            //kata/hal yang ditampilin untuk 
            //previous link
            $config['prev_link'] = '&laquo';
            //pembuka untuk previos-link
            $config['prev_tag_open'] = '<li class="page-item">';
            //penutup untuk previos-link
            $config['prev_tag_close'] = '</li>';

       //pembuka untuk halaman saat ini
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            //penutup untuk halaman saat ini
            $config['cur_tag_close'] = '</a></li>';

            //pembuka untuk nomor2nya
            $config['num_tag_open'] = '<li class="page-item">';
            //penutup untuk nomor2nya
            $config['num_tag_close'] = '</li>';

            // atribut tambahan untuk setiap anchornya.
            $config['attributes'] = ['class' => 'page-link'];

            $this->pagination->initialize($config);

	        // atribut tambahan untuk setiap anchornya.
	        $config['base_url'] = 'https://proyekkp.herokuapp.com/post/index';
            if ($this->session->userdata('keyword') == false) {
            $this->session->set_userdata('keyword', '');
        }


                if (isset($_POST['submit'])) {
                    $data['keyword'] = $_POST['keyword'];
                    $this->session->set_userdata('keyword', $data['keyword']);
                } else {
                    $data['keyword'] = $_SESSION['keyword'];
                }

            $config['total_rows'] = $this
            ->Post_model
            ->countPosts($data['keyword']);




            $config['per_page'] = 9;
	        $this->pagination->initialize($config);



        	

			// ^ untuk base url paginationnya
            $data['start'] = $this->uri->segment(3);
            $data['judul'] = "Data";
			
            $data['posts'] = $this->Post_model->getPosts(
                $config['per_page'],
                $data['start'],
                $data['keyword']
            );
            


        	$this->load->view('templates/header', $data);
        	$this->load->view('post/index', $data);
        	$this->load->view('templates/footer');
        }
    }
