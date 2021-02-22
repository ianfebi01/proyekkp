<div class="container">		
		<div class="row">
			<div class="col-md-4">
				<h1>Data Barang</h1>
			</div>
			<div class="col">
	            <?= $this->pagination->create_links(); ?>
	        </div>

		</div>

			<table class="table table-striped table-light">

			  <thead>
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Nama Barang</th>
			      <th scope="col">Stok</th>
			      <th scope="col">Harga Modal</th>
			      <th scope="col">Harga Jual</th>
			      <th scope="col">Total Penjualan</th>
			      <th scope="col">Total Modal</th>
			      <th scope="col">Total Untung</th>
			    </tr>
			  </thead>
		<?php if (isset($posts)): ?>
			<?php foreach ($posts as $post) : ?>
			  <tbody>
			    <tr>
			      <th scope="row"><?=$post['id_brg']; ?></th>
			      <td><?=$post['nama_brg']; ?></td>
			      <td><?=$post['stok']; ?> pcs</td>
			      <td>Rp. <?=$post['harga_modal']; ?></td>
			      <td>Rp. <?=$post['harga_jual']; ?></td>
			      <td><?=$post['total_penjualan']; ?> pcs</td>
			      <td>Rp. <?=$post['total_modal']; ?></td>
			      <td>Rp. <?=$post['total_untung']; ?></td>
			      <?php if (logged_in()): ?>

				      <td><a role="button" href="<?= base_url() ?>post/update/<?= $post['id_brg'] ?>" class="btn btn-dark">Update</a></td>
				      <td><a role="button" href="<?= base_url() ?>post/hapus/<?= $post['id_brg'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghaous data?')">Hapus</a></td>
			  		<?php endif; ?>
			    </tr>   
			  </tbody>
			<?php endforeach; ?>
		<?php endif; ?>

			</table>

</div>