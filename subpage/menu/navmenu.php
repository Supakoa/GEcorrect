	<!-- top bar navigation -->
	<div class="headerbar">
	
        <div class="headerbar-left">
			<a href="index.php" class="logo"><span>Admin SSRU</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item ">
                            <a class="nav-link  arrow-none" href="#" role="button" >
                                <i class="fa fa-fw fa-bullseye"></i><span class="notif-bullet">Active Now</span>
                            </a>
                            
                        </li>
                        
						<li class="list-inline-item  ">
                            <a class="nav-link  arrow-none" href="./server/logout.php" role="button" >
                                <i class="fa fa-fw fa-sign-out"></i><span class="notif-bullet">Sign-out</span>
                            </a>
                            
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>
        </nav>

	</div>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">
			<div id="sidebar-menu">
                <ul>
                        <li class="submenu">
                            <a><i class="fa fa-fw fa-user-o"></i><span>ค้นหา</span><span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">								
                                    <li><a href="search1.php"> ค้นหาทั่วไป </a></li>
                                    <li><a href="search2.php"> ค้นหาแบบกลุ่มวิชา </a></li>
                                    <li><a href="search3.php"> ค้นหาแบบกลุ่มวิชาบุคคล </a></li>	
                                </ul>
                        </li>
                                            
                        <li class="submenu">
                            <a><i class="fa fa-fw fa-user-plus"></i> <span> นำเข้าข้อมูล </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">								
                                    <li><a href="imstudent.php"> นำเข้าข้อมูลนักศึกษา </a></li>
                                    <li><a href="imgroup.php"> นำเข้าข้อมูลกลุ่มเรียน</a></li>
                                    <li><a href="imgroup_multi.php">นำเข้าข้อมูลกลุ่มเรียน<br>(หลายวิชา)</a></li>	
                                </ul>
                        </li>

                        <li class="submenu">
                            <a href="report.php"><i class="fa fa-fw fa-file-o"></i> <span> รายงาน </span> </a>
                                
                        </li>

                        <li class="submenu">
                            <a href="dataadmin.php"><i class="fa fa-fw fa-address-card-o"></i> <span> พนักงาน </span></a>
                        </li>
                        
                        <li class="submenu">
                            <a href="location.php"><i class="fa fa-fw fa-location-arrow"></i> <span> สถานที่สอบ </span></a>
                        </li>

                        
                        <li class="submenu">
                            <a href="subject.php"><i class="fa fa-fw fa-graduation-cap"></i> <span> วิชาที่สอบ </span></a>
                        </li>
                        
                        <li class="submenu">
                            <a ><i class="fa fa-fw fa-cogs"></i><span> ตั้งค่า </span><span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">								
                                    <li><a href="banner.php"> Banner </a></li>
                                    <li><a href="footer.php"> Footer </a></li>	
                                </ul>
                        </li>
                </ul>
            </div>
        </div>
	</div>
	<!-- End Sidebar -->