<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="row">
        <div class="col-xl-3 col-lg-6">
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
        <div class="col-xl-3 col-lg-6">
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
        <div class="col-xl-3 col-lg-6">
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
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-bg">
                <div class="p-t-20 d-flex justify-content-between">
                    <div class="col">
                    <h6 class="mb-0">Jumlah Temuan</h6>
                    <span class="font-weight-bold mb-0 font-20"><?= $temuan; ?></span>
                    </div>
                    <i class="fas fa-clipboard-check card-icon col-cyan font-30 p-r-30"></i>
                </div>
                <canvas id="cardChart4" height="80"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
</div>