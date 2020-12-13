            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data Pegembalian</h1>
            <div class="row">

                <div class="card shadow mb-4 p-4 col-md-3 ml-3">
                    <form action="<?php echo base_url().'admin/filter_pengembalian_nim'?>" method="post">
                    <h1 class="h5 mb-4 text-gray-800"><strong>Filter berdasarkan NIM Peminjam</strong> </h1>

                    <div class="form-group">
                        <input type="text" class="form-control" id="keyword" placeholder="Masukan NIM Peminjam" name="keyword">
                        <?php echo form_error('ulangfilter')?>
                    </div>

                        <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                    </form>
                </div>

                <div class="card shadow mb-4 p-4 col-md-3 ml-4">
                    <form action="<?php echo base_url().'admin/filter_pengembalian_tgl'?>" method="post">
                    <h1 class="h5 mb-4 text-gray-800"><strong>Filter berdasarkan Tanggal</strong> </h1>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="date" class="form-control" id="dari" placeholder="" name="dari">
                            <?php echo form_error('dari')?>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="date" class="form-control" id="sampai" placeholder="" name="sampai">
                            <?php echo form_error('sampai')?>
                        </div>
                    </div>
                        <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                    </form>
                </div>

            </div>
            

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <a href="" class="btn btn-sm btn-warning"><i class="fas fa-print mr-2"></i>Cetak Laporan</a>
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
                            <th>Tanggal Dikembalikan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($kembali as $kem) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $kem->nim_anggota ?></td>
                            <td><?php echo $kem->nama ?></td>
                            <td><?php echo $kem->kode_buku ?></td>
                            <td><?php echo $kem->judul ?></td>
                            <td><?php echo date('d/m/Y',strtotime($kem->tgl_pinjam)); ?></td>
                            <td><?php echo date('d/m/Y',strtotime($kem->tgl_dikembalikan)); ?></td>
                            <?php
                                if($kem->total_denda = NULL){
                            ?>
                                <td>Rp. <?php echo $kem->total_denda ?>;</td>
                            <?php }
                            
                            else {?>
                                <td>Rp. 0;</td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->