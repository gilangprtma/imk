<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="">
                            <div class="card-header">
                                <h4>Edit Mobil Tanki</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <input type="hidden" name="id" value="<?= $mt['id']; ?>">
                                    <div class="form-group col-md-3">
                                        <label>Nomor Polisi</label>
                                        <input type="text" class="form-control" name="nopol" value="<?= $mt['nopol']; ?>">
                                        <?= form_error('nopol', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Masukkan nopol tanpa spasi, misal AB1234ZX
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Transportir</label>
                                        <input type="text" class="form-control" name="transportir" value="<?= $mt['transportir']; ?>">
                                        <?= form_error('transportir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Merk Mobil</label>
                                        <input type="text" class="form-control" name="merk_mobil" value="<?= $mt['merk_mobil']; ?>">
                                        <?= form_error('merk_mobil', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Pola Pembayaran</label>
                                        <select name="jenis" id="jenis" class="form-control">
                                            <?php foreach ($pola as $m) : ?>
                                                <?php if ($m == $mt['jenis']) : ?>
                                                    <option value="<?= $m; ?>" selected><?= $m; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $m; ?>"><?= $m; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Kapasitas</label>
                                        <input type="text" class="form-control" name="kapasitas" value="<?= $mt['kapasitas']; ?>">
                                        <?= form_error('kapasitas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Masukkan kapasitas KLnya saja, misal 16, 24, 32.
                                        </small>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tahun Pembuatan</label>
                                        <input type="text" class="form-control" name="tahun_pembuatan" value="<?= $mt['tahun_pembuatan']; ?>">
                                        <?= form_error('tahun_pembuatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label>Jenis Produk</label>
                                        <select name="jenis_produk" id="jenis_produk" class="form-control">
                                            <?php foreach ($jenis as $m) : ?>
                                                <?php if ($m == $mt['jenis_produk']) : ?>
                                                    <option value="<?= $m; ?>" selected><?= $m; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $m; ?>"><?= $m; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    <?= form_error('jenis_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" value="<?= $mt['lokasi']; ?>">
                                        <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>TA</label>
                                        <input type="date" class="form-control" name="ta" value="<?= $mt['ta']; ?>">
                                        <?= form_error('ta', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Surat Tera Metrologi</label>
                                        <input type="date" class="form-control" name="tera" value="<?= $mt['tera']; ?>">
                                        <?= form_error('tera', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Surat Keur DLLAJ</label>
                                        <input type="date" class="form-control" name="keur" value="<?= $mt['keur']; ?>">
                                        <?= form_error('keur', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>STNK</label>
                                        <input type="date" class="form-control" name="pajak" value="<?= $mt['pajak']; ?>">
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