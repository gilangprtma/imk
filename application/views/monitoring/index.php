<!-- Main Content -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                            <h6 class="mb-0">Jumlah MT</h6>
                            <span class="font-weight-bold mb-0 font-20"><strong><?= $hitungMT; ?></strong></span>
                            </div>
                            <i class="fas fa-truck-moving card-icon col-orange font-30 p-r-30"></i>
                        </div>
                        <canvas id="cardChart1" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                            <h6 class="mb-0">MT Ready</h6>
                            <span class="font-weight-bold mb-0 font-20"><strong><?= $mtready; ?></strong></span>
                            </div>
                            <i class="fas fa-child card-icon col-green font-30 p-r-30"></i>
                        </div>
                        <canvas id="cardChart2" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-bg">
                        <div class="p-t-20 d-flex justify-content-between">
                            <div class="col">
                            <h6 class="mb-0">MT Off</h6>
                            <span class="font-weight-bold mb-0 font-20"><strong><?= $mtoff; ?></strong></span>
                            </div>
                            <i class="fas fa-ban card-icon col-indigo font-30 p-r-30"></i>
                        </div>
                        <canvas id="cardChart3" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 mt-3">
                    <div class="card">
                        <a href="<?= base_url('kalender/');?>">
                            <div class="card-bg">
                            <div class="p-t-20 d-flex justify-content-between">
                                <div class="col">
                                <h6 class="mb-0">Lihat Kalender MT</h6>
                                <span class="font-weight-bold mb-0 font-20">-->></span>
                                </div>
                                <i class="fas fa-list-alt card-icon col-cyan font-30 p-r-30"></i>
                            </div>
                            <canvas id="cardChart4" height="80"></canvas>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="margin: center;">MONITORING KESIAPAN OPERSIONAL MOBIL TANKI FT REWULU</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nopol</th>
                                            <th>Transportir</th>
                                            <th>Kapasitas</th>
                                            <th>TA</th>
                                            <th>Tera</th>
                                            <th>Keur</th>
                                            <th>Pajak</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($listmobil as $m):
                                            if($m['status']=='Ready'){ ?>
                                                <tr style="color:#0010d5;">
                                                    <td><?= $i; ?></td>
                                                    <td><strong><?= $m['nopol'];?></strong></td>
                                                    <td><?= $m['transportir'];?></td>
                                                    <td class="align-middle"><?= $m['kapasitas'];?></td>
                                                    <td><?= date('d F Y', strtotime($m['ta'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['tera'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['keur'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['pajak'])); ?></td>
                                                    <td><?= $m['status'];?></td>
                                                    <td><a href="" data-toggle="modal" data-target="#detailModalOK" class="text-warning">Detail</a></td>
                                                </tr>
                                            <?php }else{ ?>
                                                <tr style="color:#e90000;">
                                                    <td><?= $i; ?></td>
                                                    <td><strong><?= $m['nopol'];?></strong></td>
                                                    <td><?= $m['transportir'];?></td>
                                                    <td class="align-middle"><?= $m['kapasitas'];?></td>
                                                    <td><?= date('d F Y', strtotime($m['ta'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['tera'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['keur'])); ?></td>
                                                    <td><?= date('d F Y', strtotime($m['pajak'])); ?></td>
                                                    <td><?= $m['status'];?></td>
                                                    <!-- <td><a href="" data-toggle="modal" data-target="#detailModal" class="text-warning">Detail</a></td> -->
                                                    <td><a href="javascript:;" class="text-warning btn-detail" data-id="<?= $m['id']?>">Detail</a></td>
                                                </tr>
                                            <?php } ?>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Mobil Tanki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Nopol : <br>
                Status : <br>
                Temuan : <br>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModalOK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Mobil Tanki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tidak ada temuan, Mobil Tanki Siap Untuk Operasional
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 50000);

        $('.btn-detail').on('click', function(){
            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url(); ?>" + 'monitoring/get_detail',
                type: 'GET',
                data: {
                    id: id
                },
                beforeSend: function(xhr) {
                },
                success: function(response) {
                    //console.log(response);
                    var _html = ``;

                    _html += `
                        <table class="table">
                            <tr>
                                <td>Nopol</td>
                                <td>: ${response.data.nopol}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: ${response.data.status}</td>
                            </tr>
                            <tr>
                                <td>Temuan</td>
                                <td>: </td>
                            </tr>`;

                    console.log(response.data.checklist_detail);
                    
                    if (response.data.checklist_detail) {
                        $.each(response.data.checklist_detail, function(idx, obj){
                            _html += `
                                <tr>
                                    <td></td>
                                    <td>- ${obj.checklist_detail_temuan}</td>
                                </tr>
                            `;
                        });
                    }

                    _html += `
                        </table>
                    `;

                    $('#detailModal').find('.modal-body').html(_html);
                    $('#detailModal').modal('show');
                },
                error(xhr, status, error) {
                },
                complete(xhr, status) {
                }
            });
        });
    })
</script>