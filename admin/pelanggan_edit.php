<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit User</h4>
        </div>
        <div class="panel-body">
                <?php
                include 'koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "select * from users_ where id='$id'");
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="pelanggan_update.php">
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan nama.." value="<?php echo $d['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="number" class="form-control" name="password" placeholder="Masukkan password.." value="<?php echo $d['password']; ?>">
                        </div>
                        <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required="required">
                                    <option <?php if($d['role']=="user"){echo "selected='selected'";} ?> value="user">user</option>
                                    <option <?php if($d['role']=="admin"){echo "selected='selected'";} ?> value="admin">admin</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="role" placeholder="Masukkan peran user.."> -->
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="update">
                </form>
                <?php
                } ?>
                </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>