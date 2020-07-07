
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <?php if(@$sess['router_id']){ ?>
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Router</span>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?php echo base_url('dashboard') ?>" aria-expanded="false"><i class="mdi mdi-calendar"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span
                                    class="hide-menu">IP</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('ip/address') ?>" class="sidebar-link"><i class="mdi mdi-alert-outline"></i> <span class="hide-menu"> Addresses
                                        </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span
                                    class="hide-menu">PPP</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('ppp/profile') ?>" class="sidebar-link"><i class="mdi mdi-alert-outline"></i> <span class="hide-menu"> Profile </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo base_url('ppp/pppoe') ?>" class="sidebar-link"><i class="mdi mdi-alert-outline"></i> <span class="hide-menu"> PPPoe Server </span></a></li>
                            </ul>
                        </li>


                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Customer</span>
                        </li>

                    <?php } ?>



                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Configuration</span>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span
                                    class="hide-menu">Router</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="<?php echo base_url('router/data') ?>" class="sidebar-link"><i
                                            class="mdi mdi-alert-outline"></i> <span class="hide-menu"> Data Mikrotik
                                        </span></a></li>
                            </ul>
                        </li>
                        

                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer">
                <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
