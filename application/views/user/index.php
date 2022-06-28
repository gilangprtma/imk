<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">
                                <img alt="image" src="<?= base_url('assets/img/users/'.$user['image']);?>" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                <a href="#"><?= $user['name'];?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                        <h4>Personal Details</h4>
                        </div>
                        <div class="card-body">
                        <div class="py-4">
                            <p class="clearfix">
                            <span class="float-left">
                                Email
                            </span>
                            <span class="float-right text-muted">
                                <?= $user['email'];?>
                            </span>
                            </p>
                            <p class="clearfix">
                            <span class="float-left">
                                Phone / WA
                            </span>
                            <span class="float-right text-muted">
                                <?= $user['phone'];?>
                            </span>
                            </p>
                            <p class="clearfix">
                            <span class="float-left">
                                Role
                            </span>
                            <span class="float-right text-muted">
                                <?php 
                                    if($user['role_id'] == '1'){
                                        echo 'Administrator';
                                    }else{
                                        echo 'User';
                                    }
                                ?>
                            </span>
                            </p>
                            <p class="clearfix">
                            <span class="float-left">
                                Active
                            </span>
                            <span class="float-right text-muted">
                                <?php 
                                    if($user['is_active'] == '1'){
                                        echo 'Active';
                                    }else{
                                        echo 'No Active';
                                    }
                                ?>
                            </span>
                            </p>
                            <p class="clearfix">
                            <span class="float-left">
                                Active Since
                            </span>
                            <span class="float-right text-muted">
                                <?= date('d F Y', $user['date_created']);?>
                            </span>
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                aria-selected="true">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                                <form method="post" class="needs-validation">
                                    <div class="card-header">
                                    <h4>Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>