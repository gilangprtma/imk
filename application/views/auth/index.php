<div class="loader"></div>
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="mb-0 text-center">
            <h4>
              <a href="<?= base_url('auth'); ?>"> <img alt="image" src="<?= base_url('assets/img/logo_pertamina.png'); ?>" class="header-logo" height="110px" /></a>
            </h4>
          </div>

          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->unmark_flash('message'); ?>

          <div class="card card-primary">
            <div class="card-header">
            </div>
            <div class="card-body">
              <form method="POST" action="<?= base_url('auth'); ?>">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <!--<div class="float-right">
                      <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                      </a>
                    </div>-->
                  </div>
                  <input id="password" type="password" class="form-control" name="password">
                  <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!--<div class="mt-5 text-muted text-center">
            Don't have an account? <a href="<?= base_url('auth/registration'); ?>">Create One</a>
          </div>-->
        </div>
      </div>
    </div>
  </section>
</div>