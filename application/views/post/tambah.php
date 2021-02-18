<div class="container">
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Tambah Post
            </div>
            <div class="card-body">
                <form action="<?=base_url()?>post/prosesTambah" method="POST">
                <div class="form-group">
                    <label for="nama_brg">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_brg" id="nama_brg" placeholder="Masukkan Nama Barang">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan Jumlah Stok">
                </div>
                <div class="form-group">
                    <label for="harga_modal">Harga Modal</label>
                    <input type="text" class="form-control" name="harga_modal" id="harga_modal" placeholder="Masukkan Harga Modal">
                </div>
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga Jual">
                </div>
                <div class="form-group">
                    <label for="total_penjualan">Total Penjualan</label>
                    <input type="text" class="form-control" name="total_penjualan" id="total_penjualan" placeholder="Masukkan Total Penjualan">
                </div>
                
                
                
                    <button type="submit" class="btn btn-primary" >Submit</button>
                
                </form>
            </div>
        </div>
    </div>
</div>