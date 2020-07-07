            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0"><?php echo $title ?></h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <?php if (isset($title)): ?>
                        	<?php if (isset($title2)): ?>
                       			 <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $title2 ?></a></li>
                       			 <li class="breadcrumb-item active"><?php echo $title ?></li>
                        	<?php else: ?>
                       			 <li class="breadcrumb-item active"><?php echo $title ?></li>
                        	<?php endif ?>
                        <?php endif ?>
                    </ol>
                </div>
                <!-- <div class="col-md-7 col-12 align-self-center d-none d-md-block">
                    <div class="d-flex mt-2 justify-content-end">
                        <div class="d-flex mr-3 ml-2">
                            <div class="chart-text mr-2">
                                <h6 class="mb-0"><small>THIS MONTH</small></h6>
                                <h4 class="mt-0 text-info">$58,356</h4>
                            </div>
                            <div class="spark-chart">
                                <div id="monthchart"></div>
                            </div>
                        </div>
                        <div class="d-flex ml-2">
                            <div class="chart-text mr-2">
                                <h6 class="mb-0"><small>LAST MONTH</small></h6>
                                <h4 class="mt-0 text-primary">$48,356</h4>
                            </div>
                            <div class="spark-chart">
                                <div id="lastmonthchart"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>