<?php echo form_open('add/add_customer_category','class="form-material mt-2"') ?>
	<div class="form-group ">
		<label for="paket_name">Package Name </label>
		<input type="text" id="paket_name" autocomplete="off" name="paket_name" class="form-control" placeholder="Paket Gelas 2Mbps"> 
	</div>
	<div class="form-group ">
		<label for="profile_name">Package Name </label>
		<select id="profile_name" autocomplete="off" name="profile_name" class="form-control">
			<option value="">----Select Package----</option>
			<?php foreach ($data as $key => $value){ if(@$value['local-address']){  ?>
				<option value="<?php echo $value['.id'] ?>"><?php echo $value['name'] ?></option>
			<?php  }} ?>
		</select>
	</div>

	<div class="form-group ">
		<label for="paket_price">Package Price </label>
		<input type="text" id="paket_price" autocomplete="off" name="paket_price" class="form-control" placeholder="100000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> 
	</div>

	    <div class="row">	
	        <div class="col-md-6">
	            <div class="form-group">
	            <label for="local_address">Upload </label>
	            <input autocomplete="off" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="upload_speed" name="upload_speed" class="form-control"> 
	            <small class="form-control-feedback"> In Megabit. </small>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="form-group">
	            <label for="local_address">Download </label>
	            <input autocomplete="off" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"id="download_speed" name="download_speed" class="form-control"> 
	            <small class="form-control-feedback"> In Megabit. </small>   
	            </div>
	             
	        </div>
	    </div>
</form>