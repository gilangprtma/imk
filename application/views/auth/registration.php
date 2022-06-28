<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('auth/registration'); ?>">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="<?= set_value('name');?>">
                                    <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email');?>">
                                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password1" class="d-block">Password</label>
                                        <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted text-center">
                            Already Registered? <a href="<?= base_url('auth'); ?>">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>