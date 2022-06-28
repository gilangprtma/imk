<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Mobil Tanki</h4>
                        </div>
                        <div class="card-body">

                            <a href="addMobilTanki" class="btn btn-primary mb-3">Add New</a>
                            <?= $this->session->flashdata('message'); ?>
                            <?= $this->session->unmark_flash('message'); ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Nopol</th>
                                            <th>Transportir</th>
                                            <th>Kapasitas</th>
                                            <th>TA</th>
                                            <th>Tera Metrologi</th>
                                            <th>Keur DLLAJ</th>
                                            <th>STNK</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listmobil as $m): 
                                            if($m['status']=='Ready'){?>
                                                <tr style="color:#0010d5;">
                                                    <td><?= $m['nopol'];?></td>
                                                    <td><?= $m['transportir'];?></td>
                                                    <td><?= $m['kapasitas'];?></td>
                                                    <td><?= date('d F Y', strtotime($m['ta'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['tera'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['keur'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['pajak'])); ?></td>
                                                    <td><?= $m['status'];?></td>
                                                    <td>
                                                        <a href="<?= base_url('master/editMobil/' . $m['id']); ?>" class="text-warning">Edit</a> |
                                                        <a href="<?= base_url('master/deleteMobil/' . $m['id']); ?>" onclick="return confirm('Are you sure ?')" class="text-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php }else{ ?>
                                                <tr style="color:#e90000;">
                                                    <td><?= $m['nopol'];?></td>
                                                    <td><?= $m['transportir'];?></td>
                                                    <td><?= $m['kapasitas'];?></td>
                                                    <td><?= date('d F Y', strtotime($m['ta'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['tera'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['keur'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['pajak'])); ?></td>
                                                    <td><?= $m['status'];?></td>
                                                    <td>
                                                        <a href="<?= base_url('master/editMobil/' . $m['id']); ?>" class="text-warning">Edit</a> |
                                                        <a href="<?= base_url('master/deleteMobil/' . $m['id']); ?>" onclick="return confirm('Are you sure ?')" class="text-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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