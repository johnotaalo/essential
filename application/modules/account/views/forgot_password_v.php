<div class="col-md-4 col-md-offset-4">

  <br><br><br><br>

  <div class="panel panel-default">
    <div class="panel-body">
      <legend class="text-center">Forgot Password</legend>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
           <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary pull-right">Reset Password</button>
          </div>
        </div>
      </form>

      <hr>
      <p class="text-right"><?php echo anchor('account/create', 'Create an Account'); ?> - <?php echo anchor('account/access', 'Login'); ?></p>
    </div>
  </div>
</div>