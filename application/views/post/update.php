<div class="container">
    <div class="row mt-4">
      <div class="col-md-4">
        <?php foreach ($post as $post): ?>
            <div class="card">
                <div class="card-header">
                    Update Data
                </div>
                <div class="card-body">
                    <form action="<?=base_url()?>post/prosesUpdate/<?= $post['id_brg'] ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_brg">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="Masukkan Nama Barang" value="<?= $post['nama_brg'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan Jumlah Stok" value="<?= $post['stok'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_modal">Harga Modal</label>
                        <input type="text" class="form-control" name="harga_modal" id="harga_modal" placeholder="Masukkan Harga Modal" value="<?= $post['harga_modal'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga Jual" value="<?= $post['harga_jual'] ?>" required>
                    </div>
                        <div class="form-group">
                        <label for="total_penjualan">Total Penjualan</label>
                        <input type="text" class="form-control" name="total_penjualan" id="total_penjualan" placeholder="Masukkan Total Penjualan" value="<?= $post['total_penjualan'] ?>">
                    </div>
                    
                    
                        <button type="submit" class="btn btn-primary" >Update</button>
                        <a href="<?= base_url() ?>" class="btn btn-secondary" >Batal</a>
                    
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>