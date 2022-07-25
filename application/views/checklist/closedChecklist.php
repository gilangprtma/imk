<?php
// echo '<pre>';
// print_r($close);
// die();
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/bundles/izitoast/css/iziToast.min.css">

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="<?= base_url(); ?>/checklist" style="text-decoration: none;"><i class="fa fa-chevron-left mr-1"></i> List Checklist</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <?php if ($close) : ?>

                        <div class="card">
                            <form method="POST" action="#">
                                <div class="card-header">
                                    <h4>Closed Checklist</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <!-- <input type="hidden" name="id" value="<?= $close['checklist_id']; ?>"> -->
                                        <div class="form-group col-md-4">
                                            <label>Nopol</label>
                                            <input type="text" class="form-control" name="nopol" value="<?= $close['nopol']; ?>" disabled="">
                                        </div>
                                    </div>

                                    <?php if ($close['detail']) : ?>
                                        <?php foreach ($close['detail'] as $key => $value) : ?>
                                            <div class="form-row after-add-more">
                                                <div class="form-group2 col-md-5">
                                                    <label>Temuan</label>
                                                    <input type="text" class="form-control" name="temuan" value="<?= $value['checklist_detail_temuan']; ?>" disabled="">
                                                </div>
                                                <div class="form-group2 col-md-3">
                                                    <label>Kategori</label>
                                                    <input type="text" class="form-control" name="kategori" value="<?= $value['checklist_detail_kategori']; ?>" disabled="">
                                                </div>
                                                <div class="form-group2 col-md-2">
                                                    <label>Batas Temuan Hari</label>
                                                    <input type="text" class="form-control" name="batas" value="<?= date('d F Y', strtotime($value['checklist_detail_batas_temuan_hari'])); ?>" disabled="">
                                                </div>
                                                <div class="form-group2 col-md-2">
                                                    <?php if ($value['checklist_detail_is_close'] == 0) : ?>
                                                        <label></label>
                                                        <div class="buttons mt-2">
                                                            <button type="button" onClick="updateStatus('<?= $value['checklist_detail_id']; ?>')" class="btn btn-icon btn-success add-more" title="Tandai sudah selesai"><i class="fas fa-check"></i></button>
                                                        </div>
                                                    <?php elseif($value['checklist_detail_is_close'] == 2) : ?>
                                                        <label></label>
                                                        <div class="buttons mt-2">
                                                            <button type="button" onClick="updateStatus('<?= $value['checklist_detail_id']; ?>')" class="btn btn-icon btn-success add-more" title="Tandai sudah selesai"><i class="fas fa-check"></i></button>
                                                        </div>
                                                    <?php else : ?>
                                                        <label>Tanggal Selesai</label>
                                                        <input type="text" class="form-control" name="batas" value="<?= date('d F Y', strtotime($value['checklist_close_datetime_label'])); ?>" disabled="">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                                <!-- <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div> -->
                            </form>
                        </div>

                    <?php else : ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Closed Checklist</h4>
                            </div>
                            <div class="card-body">
                                Data tidak ditemukan!
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JS Libraies -->
<script src="<?= base_url(); ?>assets/bundles/izitoast/js/iziToast.min.js"></script>

<script type="text/javascript">
    function updateStatus(id) {
        //console.log(id);

        $.ajax({
            url: '<?= base_url('checklist/updateClosed'); ?>/' + id,
            method: "GET",
            data: {},
            async: false,
            dataType: 'json',
            success: function(data) {
                //console.log(data);

                iziToast.success({
                    title: 'Ok!',
                    message: data.msg,
                    position: 'topRight'
                });

                setTimeout(function() {
                    location.reload();
                }, 3000);
            },
            error(xhr, status, error) {
                console.log(xhr.responseJSON);

                iziToast.error({
                    title: 'Error!',
                    message: xhr.responseJSON.msg,
                    position: 'topRight'
                });
            },
            complete(xhr, status) {}
        });
    }

    $(document).ready(function() {});
</script>