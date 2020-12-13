                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Detail Pengembalian Buku</h1>
                <div class="row">
                        <div class="card shadow col-md-5 p-3">

                            <form action="<?php echo base_url().'admin/act_peminjaman'?>" method="post">
                            <?php foreach($detail as $det) { ?>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>NIM</label>
                                        <input type="number" class="form-control" id="nim_anggota" placeholder="" name="nim_anggota" value="<?php echo $det->nim?>" readonly>
                                        <?php echo form_error('nim')?>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?php echo $det->nama?>" readonly>
                                        <?php echo form_error('nama')?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Kode Buku</label>
                                        <input type="text" class="form-control" id="kode_buku" placeholder="" name="kode_buku" value="<?php echo $det->kode_buku?>" readonly>
                                        <?php echo form_error('kode_buku')?>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" id="judul" placeholder="" name="judul" value="<?php echo $det->judul?>" readonly>
                                        <?php echo form_error('judul')?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tanggal Peminjaman</label>
                                        <input type="text" class="form-control" id="tgl_pinjam" placeholder="" name="tgl_pinjam" value="<?php echo date('d/m/Y',strtotime($det->tgl_pinjam)); ?>" readonly>
                                        <?php echo form_error('tgl_pinjam')?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Maksimal Dikembalikan</label>
                                        <input type="text" class="form-control" id="tgl_kembali" placeholder="" name="tgl_kembali" value="<?php echo date('d/m/Y',strtotime($det->tgl_kembali)); ?>" readonly>
                                        <?php echo form_error('tgl_kembali')?>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Tanggal Dikembalikan</label>

                                    <?php
                                        $date = date("Y-m-d");
                                    ?>

                                    <input type="date" class="form-control" id="tgl_dikembalikan" placeholder="" name="tgl_dikembalikan" value="<?php echo $date?>">
                                    <?php echo form_error('tgl_dikembalikan')?>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Denda</label>

                                    <?php
                                        if($date > $det->tgl_kembali){
                                            //menghitung selisih hari
                                            $batas = strtotime($det->tgl_kembali);
                                            $dikembalikan = strtotime($date);
                                            $selisih = abs(($batas-$dikembalikan)/(60*60*24));

                                            
                                            //total denda
                                            $denda = $det->denda;
                                            $tot_denda = $denda*$selisih;
                                        }
                                        else{
                                            $tot_denda = 0;
                                        }
                                    ?>
                                    <input type="number" class="form-control" id="jum_denda" placeholder="" name="jum_denda" value="<?php echo $tot_denda?>" readonly>
                                    <?php echo form_error('jum_denda')?>
                                </div>

                            <?php } ?>
                                
                                <a href="<?php echo base_url()?>admin/pengembalian" class="btn btn-sm btn-danger">Batal</a>
                                <button type="submit" class="btn btn-sm btn-primary">Konfirmasi</button>
                            </form>
                        </div>                    

                </div>                    
                </div>

                