            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data Peminjaman</h1>

            <div class="card shadow mb-4 p-4 col-md-3">
                <form action="<?php echo base_url().'admin/filter_peminjaman'?>" method="post">
                <h1 class="h5 mb-4 text-gray-800"><strong>Filter berdasarkan NIM Peminjam</strong> </h1>

                <div class="form-group">
                    <input type="text" class="form-control" id="keyword" placeholder="Masukan NIM Peminjam" name="keyword">
                    <?php echo form_error('ulangfilter')?>
                </div>

                    <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                </form>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "berhasil"){
                            echo "<div class='alert alert-success'>Berhasil Membatalkan Transaksi</div>";
                        }
                    }
                ?>

                <div class="card-header py-3">
                    <a href="<?php echo base_url('admin/cetak_lappem')?>" class="btn btn-sm btn-warning" target="_blank"><i class="fas fa-print mr-2"></i>Cetak Laporan</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Maksimal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($pinjam as $pinj) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pinj->nim_anggota ?></td>
                            <td><?php echo $pinj->nama ?></td>
                            <td><?php echo $pinj->kode_buku ?></td>
                            <td><?php echo $pinj->judul ?></td>
                            <td><?php echo date('d/m/Y',strtotime($pinj->tgl_pinjam)); ?></td>
                            <td><?php echo date('d/m/Y',strtotime($pinj->tgl_kembali)); ?></td>
                            <?php
                                $date = date("Y-m-d");
                                
                                if($pinj->tgl_kembali < $date){
                            ?>
                                <td class="text-danger">Melebihi Batas</td>
                            <?php }
                                else{
                            ?>
                                <td><?php echo $pinj->status ?></td>
                            <?php }?>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger mr-1"><i class="fas fa-window-close" data-placement="top" title="Batalkan Transaksi" onclick="hapusdata(<?php echo $pinj->id_transaksi;?>)";></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

            <script type="text/javascript">
                var url="<?php echo base_url();?>";
                function hapusdata(id_transaksi){
                var r=confirm("Apakah anda yakin akan menghapus data ini ?")
                    if (r==true)
                    window.location = url+"admin/batal/"+id_transaksi;
                    else
                    return false;
                } 
            </script>