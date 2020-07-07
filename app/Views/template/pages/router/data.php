<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Router Data</h4>
                <div class="progress">
                    <div class="bg-success" role="progressbar" style="width: 100%; height: 2px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
			</div>
			<div class="table-responsive">
			
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Add Router Data</h4>
                <div class="progress  mb-3">
                    <div class="bg-success" role="progressbar" style="width: 100%; height: 2px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
               	<?php echo form_open('router/check_connection','class="router-add" novalidate'); ?>
               		<div class="form-row">
               			<div class="col-md-12 mb-2">
	                      <label for="name_router">Name</label>
	                      <input type="text" class="form-control" id="name_router" name="name_router" placeholder="Router-" required>
	                      <div class="invalid-feedback">
	                        This Field Is Required
	                      </div>
	                    </div>
               		</div>
                	<div class="form-row">
	                    <div class="col-md-8 mb-2">
	                      <label for="router_ip">IP Address</label>
	                      <input type="text" class="form-control" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" id="router_ip" name="router_ip" placeholder="127.0.0.1" required>
	                      <div class="invalid-feedback">
	                        IPV4 Only
	                      </div>
	                    </div>
	                    <div class="col-md-4 mb-2">
	                      <label for="router_port">Port</label>
	                      <input type="text" class="form-control"   pattern="^([0-9]{1,4}|[1-5][0-9]{4}|6[0-4][0-9]{3}|65[0-4][0-9]{2}|655[0-2][0-9]|6553[0-5])$" name="router_port" id="router_port" placeholder="8728"  required>
	                      <div class="invalid-feedback">
	                        0-65535
	                      </div>
	                    </div>
	                  </div>
	                  <div class="form-row">
	                  	<div class="col-md-12 mb-2">
	                      <label for="username">Username</label>
	                      <input type="text" class="form-control" id="username" name="username" placeholder="admin" required>
	                      <div class="invalid-feedback">
	                        This Field Is Required
	                      </div>
	                    </div>
	                  </div>
	                  <div class="form-row">
	                  	<div class="col-md-12 mb-2">
	                      <label for="password">Password</label>
	                      <input type="text" class="form-control" id="password" name="password" placeholder="password" required>
	                      <div class="invalid-feedback">
	                         This Field Is Required
	                      </div>
	                    </div>
	                  </div>
	                  <div class="text-right mt-2 btn-sbm">
	                     <input type="hidden" class="btn-submit" value="1" name="">
	                  	 <button class="btn btn-success btn-submit" id="myBtn" type="submit">Check Conection</button>
	                  </div>
                </form>
            </div>
        </div>
	</div>
</div>