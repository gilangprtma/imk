<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Checklist</h4>
                        </div>
                        <div class="card-body">

                            <a href="checklist/addChecklist" class="btn btn-primary mb-3">Add New</a>
                            <?= $this->session->flashdata('message'); ?>
                            <?= $this->session->unmark_flash('message'); ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Nopol</th>
                                            <th>Tanggal Checklist</th>
                                            <th>Temuan</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($checklist as $c): ?>
                                            <tr>
                                                <td><?= $c['id_mobil'];?></td>
                                                <td><?= $c['tanggal_checklist'];?></td>
                                                <td><?= $c['temuan'];?></td>
                                                <td><?= $c['kategori'];?></td>
                                                <td>
                                                    <?php if($c['batas'] >= date('Y-m-d')){
                                                        echo "Masih ada Temuan";
                                                    }else{
                                                        echo "Blokir";
                                                    }?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('checklist/closed/' . $c['id']); ?>" class="text-success">Closed</a> |
                                                    <a href="<?= base_url('checklist/editChecklist/' . $c['id']); ?>" class="text-warning">Edit</a> |
                                                    <a href="<?= base_url('checklist/delete/' . $c['id']); ?>" onclick="return confirm('Are you sure ?')" class="text-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>