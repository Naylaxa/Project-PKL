<?php include 'header.php'; ?>
<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Pelanggan Baru</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="pelanggan_aksi.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan nama..">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="number" class="form-control" name="password" placeholder="Masukkan password..">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required="required">
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="role" placeholder="Masukkan peran user.."> -->
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="simpan">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>