
                              
                                <?php echo form_open('add/add_ppp_profile','class="form-material mt-0"') ?>
                                    
                                    <div class="form-group ">
                                        <label for="name_profile">Profile Name </label>
                                        <input type="text" id="name_profile" autocomplete="off" name="name_profile" class="form-control" placeholder="Profile Name"> </div>
                                    
                                    <div class="form-group">
                                        <label for="local_address">Local Address </label>
                                        <input type="text" minlength="7" autocomplete="off" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$"   id="local_address" name="local_address" class="form-control" placeholder="192.168.0.1"> </div>
                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="local_address">Upload </label>
                                            <input autocomplete="off" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="upload_speed" name="upload_speed" class="form-control" placeholder="192.168.0.1"> 
                                            <small class="form-control-feedback"> In Megabit. </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="local_address">Download </label>
                                            <input autocomplete="off" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"id="download_speed" name="download_speed" class="form-control" placeholder="192.168.0.1"> 
                                            <small class="form-control-feedback"> In Megabit. </small>   
                                            </div>
                                             
                                        </div>
                                    </div>
                                   


                                </form>
                            <script type="text/javascript">
                                var ipv4_address = $('#local_address');
                                ipv4_address.inputmask({
                                    alias: "ip",
                                    greedy: false 
                                });
                            </script>