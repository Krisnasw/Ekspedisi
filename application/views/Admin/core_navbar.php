<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="<?php echo base_url('/') ?>plugins/images/users/d1.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">Admin<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <!-- <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li -->>
                            <li><a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Auth/do_logout') ?>'"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a  href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Beranda')?>'" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a></li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Master Data <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Cabang')?>'"><i class="fa fa-building"></i> Data Cabang </a></li>
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Bank')?>'"><i class="fa fa-bank"></i> Data Bank</a> </li>
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Karyawan')?>'"><i class="fa fa-user-md"></i> Data Karyawan</a></li>
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Toko')?>'"><i class="fa fa-shopping-bag"></i> Data Toko</a></li>
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Tarif')?>'"><i class="fa fa-usd"></i> Data Tarif </a></li>
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Biaya')?>'"><i class="fa fa-home"></i> Data Biaya Operasional</a></li>
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('TruckSupir')?>'"><i class="fa fa-truck"></i> Data Truck & Supir</a></li>
                            <!-- <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Supir')?>'"><i class="fa fa-user"></i> Data Supir </a></li> -->
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Transaksi</li>
                    
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart p-r-10"></i> <span class="hide-menu">Transaksi<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Order')?>'"><i class="fa fa-tags"></i> Penerimaan Order </a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Order-Nota')?>'"><i class="fa fa-file"></i> Nota Order </a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url('Pengiriman')?>'"><i class="fa fa-tags"></i> Pengiriman Order </a></li>
                        </ul>
                        <ul class="nav nav-second-level collapse">
                            <li> <a href="javascript:void(0)" onclick="window.location.href='<?=base_url('Penggajian')?>'"><i class="fa fa-money"></i> Penggajian </a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>