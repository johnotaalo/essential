<div class="col-md-4 col-md-offset-4">

  <br><br><br><br>

  <div class="panel panel-default">
    <div class="panel-body">
      <legend class="text-center">Access your Account</legend>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
           <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
           <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            <p class="help-block"><?php echo anchor('imci/account/forgot_password', 'Forgot Password?'); ?></p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary pull-right">Sign In</button>
          </div>
        </div>
      </form>

      <hr>
      <p class="text-center">Dont have an account? <?php echo anchor('account/create', 'Create an Account'); ?></p>
    </div>
  </div>
</div>