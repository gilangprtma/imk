<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="">
                            <div class="card-header">
                                <h4>Closed Checklist</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <input type="hidden" name="id" value="<?= $close['id']; ?>">
                                    <div class="form-group col-md-4">
                                        <label>Nopol</label>
                                        <input type="text" class="form-control" name="nopol" value="<?= $close['id_mobil']; ?>">
                                        <?= form_error('temuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row after-add-more">
                                    <div class="form-group2 col-md-5">
                                        <label>Temuan</label>
                                        <input type="text" class="form-control" name="temuan" value="<?= $close['temuan']; ?>">
                                        <?= form_error('temuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group2 col-md-3">
                                        <label>Kategori</label>
                                        <select name="kategori[]" id="kategori" class="form-control">
                                            <option value="">--Pilih Kategori Temuan--</option>
                                            <option value="Ban">Ban</option>
                                            <option value="Lampu-lampu">Lampu - Lampu</option>
                                            <option value="Ijk Baut">Ijk Baut</option>
                                            <option value="Bracket">Bracket & Seal</option>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group2 col-md-2">
                                        <label>Batas Temuan Hari</label>
                                        <input type="date" class="form-control" name="batas" value="<?= $close['batas']; ?>">
                                        <?= form_error('batas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group2 col-md-2">
                                        <label></label>
                                        <div class="buttons mt-2">
                                            <a href="#" class="btn btn-icon btn-success add-more"><i class="fas fa-check"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
