<link rel="stylesheet" href="<?= base_url(); ?>assets/bundles/izitoast/css/iziToast.min.css">

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12" id="error_msg">
                    
                </div>

                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="" id="add_checklist">
                            <div class="card-header">
                                <h4>Add Checklist</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Nopol</label>
                                        <select class="form-control select2" name="id_mobil" id="id_mobil" required="">
                                            <?php foreach ($list as $l) : ?>
                                                <option value="<?= $l['id']; ?>"><?= $l['nopol']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row after-add-more">
                                    <div class="form-group2 col-md-5">
                                        <label>Temuan</label>
                                        <input type="text" class="form-control" name="temuan[]" required="">
                                        <?= form_error('temuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group2 col-md-3">
                                        <label>Kategori</label>
                                        <select name="kategori[]" id="kategori" class="form-control" required="">
                                            <option value="">--Pilih Kategori Temuan--</option>
                                            <option value="Ban">Ban</option>
                                            <option value="Lampu-lampu">Lampu - Lampu</option>
                                            <option value="Ijk Baut">Ijk Baut</option>
                                            <option value="Bracket">Bracket & Seal</option>
                                            <option value="Lain-lain">Lain - Lain</option>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group2 col-md-2">
                                        <label>Batas Temuan Hari</label>
                                        <input type="date" class="form-control" name="batas[]" required="">
                                        <?= form_error('batas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group2 col-md-2">
                                        <label></label>
                                        <div class="buttons mt-2">
                                            <a href="#" class="btn btn-icon btn-success add-more"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Klik icon + untuk menambah jumlah temuan checklist
                                    </small>
                                </div>

                                <!-- <div class="copy invisible">
                                    <div class="form-row">
                                        <div class="form-group2 col-md-5">
                                            <label>Temuan</label>
                                            <input type="text" class="form-control" name="temuan[]">
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
                                            <input type="date" class="form-control" name="batas[]">
                                            <?= form_error('batas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group2 col-md-2">
                                            <label></label>
                                            <div class="buttons mt-2">
                                                <a href="#" class="btn btn-icon btn-danger remove"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Klik icon x untuk mengurangi jumlah temuan checklist
                                        </small>
                                    </div>
                                </div> -->

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

<!-- JS Libraies -->
<script src="<?= base_url(); ?>assets/bundles/izitoast/js/iziToast.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".add-more").click(function() {
            //var html = $(".copy").html();
            var html = `
                <div class="copy">
                    <div class="form-row">
                        <div class="form-group2 col-md-5">
                            <label>Temuan</label>
                            <input type="text" class="form-control" name="temuan[]" required="">
                        </div>
                        <div class="form-group2 col-md-3">
                            <label>Kategori</label>
                            <select name="kategori[]" id="kategori" class="form-control" required="">
                                <option value="">--Pilih Kategori Temuan--</option>
                                <option value="Ban">Ban</option>
                                <option value="Lampu-lampu">Lampu - Lampu</option>
                                <option value="Ijk Baut">Ijk Baut</option>
                                <option value="Bracket">Bracket & Seal</option>
                            </select>
                        </div>
                        <div class="form-group2 col-md-2">
                            <label>Batas Temuan Hari</label>
                            <input type="date" class="form-control" name="batas[]" required="">
                        </div>
                        <div class="form-group2 col-md-2">
                            <label></label>
                            <div class="buttons mt-2">
                                <a href="#" class="btn btn-icon btn-danger remove"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click", ".remove", function() {
            $(this).parents(".form-row").remove();
        });

        $('#add_checklist').on('submit', function(e) {
            e.preventDefault();

            var id = $('#id_mobil').val();
            var temuan = [];
            var kategori = [];
            var batas = [];

            $("input[name='temuan[]']").map(function() {
                temuan.push($(this).val());
            }).get();

            $("select[name='kategori[]']").map(function() {
                kategori.push($(this).val());
            }).get();

            $("input[name='batas[]']").map(function() {
                batas.push($(this).val());
            }).get();

            $.ajax({
                url: '<?= base_url('checklist/saveChecklist'); ?>',
                method: "POST",
                data: {
                    id: id,
                    temuan: temuan,
                    batas: batas,
                    kategori: kategori
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#submit').prop('disabled', false);

                    iziToast.success({
                        title: 'Ok!',
                        message: data.msg,
                        position: 'topRight'
                    });

                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                },
                error(xhr, status, error) {
                    console.log(xhr.responseJSON);

                    if (xhr.responseJSON.error_code == 'error_validation') {
                        $.each(xhr.responseJSON.data, function(key, value) {
                            iziToast.error({
                                title: 'Error!',
                                message: value,
                                position: 'topRight'
                            });
                        });
                    } else {
                        iziToast.error({
                            title: 'Error!',
                            message: xhr.responseJSON.msg,
                            position: 'topRight'
                        });
                    }
                },
                complete(xhr, status) {
                }
            });
        });
    });
</script>