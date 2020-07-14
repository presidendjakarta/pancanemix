
                <div class="widget-content searchable-container list">

                    <div class="card card-body">
                    	<div class="card">
	                        <div class="row">
	                                <div class="col-md-8">
	                                    <h4 class="card-title"><?php echo $title ?></h4>
	                                </div>
	                                <div class="col-md-4 text-right d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
	                                       <?php 
	                                       		if (isset($button_add)) {
	                                       			echo $button_add;
	                                       		}

	                                        ?>
	                                </div>
	                        </div>
	                    </div>


                        <div class="table-responsive" id="data-page" data-url='<?php echo $target ?>'>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->