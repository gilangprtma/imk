<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List User</h4>
                        </div>
                        <div class="card-body">

                            <a href="addUser" class="btn btn-primary mb-3">Add New</a>
                            <?= $this->session->flashdata('message'); ?>
                            <?= $this->session->unmark_flash('message'); ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $l): ?>
                                            <tr>
                                                <td><?= $l['name'];?></td>
                                                <td><?= $l['email'];?></td>
                                                <td><?= $l['phone'];?></td>
                                                <td>
                                                    <?php if($l['role_id'] == 1){
                                                        echo "Administrator";
                                                    }else{
                                                        echo "User";
                                                    }?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('user/editUser/' . $l['id']); ?>" class="text-warning">Edit</a> |
                                                    <a href="<?= base_url('user/delete/' . $l['id']); ?>" onclick="return confirm('Are you sure ?')" class="text-danger">Delete</a>
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