<?php
    class Post_model extends CI_Model{
        public function tambahPost(){
        	$stok=$_POST['stok'];
        	$hm=$_POST['harga_modal'];
        	$hj=$_POST['harga_jual'];
        	$tp=$_POST['total_penjualan'];
        	$tm= $stok*$hm;
        	$pm=$tp*$hm;
        	$sisa_stok= $stok-$tp;
        	$tu= $tp*$hj-$pm;
            $data = array(
                'nama_brg' => $this->input->post('nama_brg'),
                'stok' => $sisa_stok,
                'harga_modal' => $this->input->post('harga_modal'),
                'harga_jual' => $this->input->post('harga_jual'),
                'total_penjualan' =>$tp,
                'total_modal' => $tm,
                'total_untung' =>$tu
                
                

            );
            $this->db->insert('posts',$data);
        }
        public function getAllPost(){
        	return $this->db->get('posts')->result_array();
        }
        public function getPosts($limit, $start, $keyword = null){
        	return $this->db
        	->select("id_brg,nama_brg,stok,harga_modal,harga_jual,total_penjualan,total_modal,total_untung")
        	->like('nama_brg', $keyword)
        	->order_by('id_brg', 'asc')
        	->get('posts', $limit, $start)
        	->result_array();
        }
        public function countPosts($keyword = null)
	    {
	        return $this->db->like('nama_brg', $keyword)
            ->from('posts')
            ->count_all_results();

	    }
	    public function getPostById($id){
	    	return $this->db
	    	->select("id_brg,nama_brg,stok,harga_modal,harga_jual,total_penjualan,total_modal,total_untung")
	    	->where('id_brg', $id)
	    	->get('posts')
	    	->result_array();
	    }
	    public function updatePost($id){
	    	$stok=$_POST['stok'];
        	$hm=$_POST['harga_modal'];
        	$hj=$_POST['harga_jual'];
        	$tp=$_POST['total_penjualan'];
        	$tm= $stok*$hm;
        	$pm=$tp*$hm;
        	$sisa_stok= $stok-$tp;
        	$tu= $tp*$hj-$pm;
	    	$data = array(
	    		
	    		'nama_brg' => $this->input->post('nama_brg'),
	    		'stok' => $sisa_stok,
	    		'harga_modal' => $this->input->post('harga_modal'),
	    		'harga_jual' => $this->input->post('harga_jual'),
	    		'total_penjualan' => $tp,
	    		'total_modal' => $tm,
                'total_untung' => $tu
	    	);
	    	$this->db
	    	->where('id_brg', $id)
	    	->update('posts', $data);
	    }
	    public function hapusPost($id){
	    	$this->db
	    	->where('id_brg', $id)
	    	->delete('posts');
	    }
	    public function countAllPost($keyword = null){
	        return $this->db->like('nama_brg', $keyword)
	        ->from('posts')
	        ->count_all_result();
	    }


    }