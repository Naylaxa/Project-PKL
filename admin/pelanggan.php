<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Users</h4>
        </div>
        <div class="panel-body">
            <a href="pelanggan_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            
            <br><br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama</th>
                    <!-- <th>Password</th> -->
                    <th>Role</th>
                    <th width="15%">OPSI</th>
                </tr>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi, "select * from users_");
                $no = 1;
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <!-- <td><?php echo $d['password']; ?></td> -->
                        <td><?php
                            if($d['role']=="user"){
                                echo "<div class='label label-warning'>user</div>";
                            }else if($d['role']=="admin"){
                                echo "<div class='label label-info'>admin</div>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="pelanggan_edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="pelanggan_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                } ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>