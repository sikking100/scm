<h1 class="h3 mb-2 text-gray-800">User</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola User</h6>
        <a href="media.php?page=createuser" class="btn btn-primary btn-lg"><i class="fas fa-user-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        $query = mysql_query("SELECT * FROM user WHERE status != 'supplier'");
                        while($r = mysql_fetch_array($query)) {
                            echo "
                            <tr>
                                <td>$r[username]</td>
                                <td>$r[nama]</td>
                                <td>$r[alamat]</td>
                                <td>$r[email]</td>
                                <td>$r[telp]</td>
                                <td>$r[status]</td>
                                <td><img src='foto/small_$r[foto]'></td>
                                <td><a class='btn btn-info btn-circle' href='media.php?page=detailuser&id=$r[id_user]'><i class='fas fa-users-cog'></i></a>
                                    <a class='btn btn-warning btn-circle' href='media.php?page=edituser&id=$r[id_user]'><i class='fas fa-user-edit'></i></a>
                                    ";
                            ?> 
                                    <a class="btn btn-danger btn-circle" href="media.php?page=hapususer&id=<?php echo "$r[id_user]"; ?>&foto=<?php echo "$r[foto]"; ?>" onclick="return confirm('Are you sure you want to Remove?');"><i class="fas fa-user-times"></i></a>
                            <?php echo "
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>