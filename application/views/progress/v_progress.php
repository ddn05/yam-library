            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Cek Progress</h1>
            </div>

            <div class="row">
                <div class="card shadow mb-4 p-4 col-md-3 ml-3">
                    <form action="<?php echo base_url().'admin/filter_pengembalian_nim'?>" method="post">
                    <h1 class="h5 mb-4 text-gray-800"><strong>Masukan NIM Anggota</strong> </h1>

                    <div class="form-group">
                        <input type="text" class="form-control" id="keyword" placeholder="Masukan NIM Peminjam" name="keyword">
                        <?php echo form_error('ulangfilter')?>
                    </div>

                        <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                    </form>
                </div>

                <div class="card shadow mb-4 p-4 col-md-3 ml-3">
                    <form action="<?php echo base_url().'admin/filter_pengembalian_nim'?>" method="post">
                    <h1 class="h5 mb-4 text-gray-800"><strong>Masukan Kode Buku</strong> </h1>

                    <div class="form-group">
                        <input type="text" class="form-control" id="keyword" placeholder="Masukan Kode Buku" name="keyword">
                        <?php echo form_error('ulangfilter')?>
                    </div>

                        <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                    </form>
                </div>
            </div>
            
            <!-- Nama :
            NIM :
            Jenis Kelamin :
            Alamat :
            Jumlah Buku yang masih dipinjam :
            Jumlah Buku yang sudah dikembalikan :
            Total Peminjaman :
            Data Buku yang dipinjam -->
            <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Progress Anggota</h6>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr><td  class="p-1 pl-0">Nama</td><td> : Dadan</td></tr>
                            <tr><td class="p-1 pl-0">NIM</td><td> : 1177050026</td></tr>
                            <tr><td class="p-1 pl-0">Jenis Kelamin</td><td> : Laki-Laki</td></tr>
                            <tr><td class="p-1 pl-0">Alamat</td><td> : Bandung</td></tr>
                            <tr><td class="p-1 pl-0"><hr></td><td><hr></td></tr>
                            <tr><td class="p-1 pl-0">Buku Yang Belum Dikembalikan </td><td> : 16pcs</td></tr>
                            <tr><td class="p-1 pl-0">Buku Yang Sudah Dikembalikan </td><td> : 16pcs</td></tr>
                            <tr><td class="p-1 pl-0">Total Buku yang dipinjam </td><td> : 16pcs</td></tr>
                            <tr><td class="p-1 pl-0"><hr></td><td><hr></td></tr>
                        </table>


                        <!-- table progress -->

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Dipinjam</th>
                                    <th>Maks. Dikembalikan</th>
                                    <th>Dikembalikan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1177050026</td>
                                    <td>Easy Copywriting</td>
                                    <td>08/12/2020</td>
                                    <td>15/08/2020</td>
                                    <td>20/08/2020</td>
                                    <td>Dikembalikan</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->