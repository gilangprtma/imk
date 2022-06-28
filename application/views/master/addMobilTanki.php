<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="">
                            <div class="card-header">
                                <h4>Add Mobil Tanki</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Nomor Polisi</label>
                                        <input type="text" class="form-control" name="nopol" value="<?= set_value('nopol'); ?>">
                                        <?= form_error('nopol', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Masukkan nopol tanpa spasi, misal AB1234ZX
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Transportir</label>
                                        <input type="text" class="form-control" name="transportir" value="<?= set_value('transportir'); ?>">
                                        <?= form_error('transportir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Merk Mobil</label>
                                        <input type="text" class="form-control" name="merk_mobil" value="<?= set_value('merk_mobil'); ?>">
                                        <?= form_error('merk_mobil', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Pola Pembayaran</label>
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="">--Pilih Pola Pembayaran--</option>
                                            <option value="Pola Sewa">Pola Sewa</option>
                                            <option value="Pola Tarif">Pola Tarif</option>
                                        </select>
                                        <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Kapasitas</label>
                                        <input type="text" class="form-control" name="kapasitas" value="<?= set_value('kapasitas'); ?>">
                                        <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Masukkan kapasitas KLnya saja, misal 16, 24, 32.
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tahun Pembuatan</label>
                                        <input type="text" class="form-control" name="tahun_pembuatan" value="<?= set_value('tahun_pembuatan'); ?>">
                                        <?= form_error('tahun_pembuatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Jenis Produk</label>
                                        <select name="jenis_produk" id="jenis_produk" class="form-control">
                                            <option value="">--Pilih Jenis Produk--</option>
                                            <option value="Multi Produk">Multi Produk</option>
                                            <option value="Pertashop">Pertashop</option>
                                            <option value="Industri">Industri</option>
                                            <option value="Avtur">Avtur</option>
                                        </select>
                                        <?= form_error('jenis_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" value="<?= set_value('lokasi'); ?>">
                                        <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>TA</label>
                                        <input type="date" class="form-control" name="ta" value="<?= set_value('ta'); ?>">
                                        <?= form_error('ta', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Surat Tera Metrologi</label>
                                        <input type="date" class="form-control" name="tera" value="<?= set_value('tera'); ?>">
                                        <?= form_error('tera', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Surat Keur DLLAJ</label>
                                        <input type="date" class="form-control" name="keur" value="<?= set_value('keur'); ?>">
                                        <?= form_error('keur', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>STNK</label>
                                        <input type="date" class="form-control" name="pajak" value="<?= set_value('pajak'); ?>">
                                        <?= form_error('pajak', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>