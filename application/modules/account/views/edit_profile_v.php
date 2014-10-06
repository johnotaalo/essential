<div class="col-md-10 col-md-offset-1">

  <div class="panel panel-default">
    <div class="panel-body">
      <legend class="text-center">Update your Profile</legend>

      <?php echo form_open('', array('class'=>'form-horizontal', 'role'=>'form')); ?>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Username">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Surname</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Surname">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Other Names</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="inputPassword3" placeholder="Enter Other Names">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">ID Number</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" placeholder="Enter ID Number">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label sr-only">Change Password</label>
            <div class="col-sm-9">
              <p class="help-block text-right"><?php echo anchor('account/change_password', 'Change Password'); ?></p>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Gender</label>
            <div class="col-sm-9">
              <select name="" class="form-control">
                <option value="">Select Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Birthday</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="datepicker" placeholder="Select Birthday">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">County</label>
            <div class="col-sm-9">
              <select name="" class="form-control">
                <option value="">Select County</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="inputEmail3" placeholder="Enter Phone No">
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Facility Affiliated</label>
            <div class="col-sm-9">
              <select name="" class="form-control">
                <option value="">Select Facility</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Employer Type</label>
            <div class="col-sm-9">
              <select name="" class="form-control">
                <option value="">Select Employer</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Cadre</label>
            <div class="col-sm-9">
              <select name="" class="form-control">
                <option value="">Select Cadre</option>
              </select>
            </div>
          </div>

          <hr>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Professional No</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="inputPassword3" placeholder="Enter Professional No">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Personnel No</label>
            <div class="col-sm-9">
             <input type="text" class="form-control" id="inputPassword3" placeholder="Enter Personnel No">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
        </div>
      </div>

      <?php echo form_close(); ?>

    </div>
  </div>
</div>