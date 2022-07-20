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
                                            <th>Tanggal Input</th>
                                            <th>Status</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($checklist) : ?>
                                            <?php foreach ($checklist as $c): ?>
                                                <tr>
                                                    <td><?= $c['nopol']; ?></td>
                                                    <td><?= $c['checklist_created_datetime_label']; ?></td>
                                                    <td>
                                                        <?php if ($c['checklist_is_close'] == 0) : ?>
                                                            <h6><span class="badge badge-danger"><?= $c['checklist_is_close_label']; ?></span></h6>
                                                        <?php else : ?>
                                                            <h6><span class="badge badge-success"><?= $c['checklist_is_close_label']; ?></span></h6>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $c['checklist_close_datetime_label']; ?></td>
                                                    <!-- <td>
                                                        <?php if($c['batas'] >= date('Y-m-d')){
                                                            echo "Masih ada Temuan";
                                                        }else{
                                                            echo "Blokir";
                                                        }?>
                                                    </td> -->
                                                    <td>
                                                        <!-- <a href="<?= base_url('checklist/closed/' . $c['checklist_id']); ?>" class="text-success">Closed</a> |
                                                        <a href="<?= base_url('checklist/editChecklist/' . $c['checklist_id']); ?>" class="text-warning">Edit</a> |
                                                        <a href="<?= base_url('checklist/delete/' . $c['checklist_id']); ?>" onclick="return confirm('Are you sure ?')" class="text-danger">Delete</a> -->

                                                        <a href="<?= base_url('checklist/closed/' . $c['checklist_id']); ?>" class="">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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