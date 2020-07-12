
                <div class="widget-content searchable-container list">

                    <div class="card card-body">
                    	<div class="card">
	                        <div class="row">
	                                <div class="col-md-8">
	                                    <h4 class="card-title">PPP PROFILE</h4>
	                                </div>
	                                <div class="col-md-4 text-right d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
	                                        <a href="javascript:void(0)" id="btn-add-contact" data-size='' data-button='Save' data-title='Add Profile' data-url='<?php echo base_url('add/view_ppp_profile') ?>' class="btn btn-info panca-mod"><i class="fas fa-plus font-16 mr-1"></i> Add Profile</a>
	                                </div>
	                        </div>
	                    </div>

                        <div class="table-responsive" id="data_profile_ppp">
                            
                        </div>
                    </div>
                </div>


<!-- /.start modal -->
<div class="modal fade" id="customModal" tabindex="-1" role="dialog"
    aria-labelledby="customModalx" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title text-white" id="customModalx">{{title}}</h4>
                <button type="button" class="close " data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                Wai t......
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info btn-action">{{btn-action}}}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.end modal -->