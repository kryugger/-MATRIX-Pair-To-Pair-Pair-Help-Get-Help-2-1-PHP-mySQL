<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
<!-- BEGIN HEADER INNER -->
<div class="page-header-inner ">
<!-- BEGIN LOGO -->
<div class="page-logo">
<a href="home.php">
<img src="assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" style="width: 160px;" /> </a>
<div class="menu-toggler sidebar-toggler"> </div>
</div>
<!-- END LOGO -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
<!-- END RESPONSIVE MENU TOGGLER -->
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
<ul class="nav navbar-nav pull-right">
<li class="dropdown dropdown-user">
<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
<span class="username"> <?php echo $user; ?> </span>
<i class="fa fa-angle-down"></i>
</a>
<ul class="dropdown-menu dropdown-menu-default">

<li><a href="changepassword.php"><i class="fa fa-cogs"></i> Change Password </a></li>
<li><a href="signout.php"><i class="fa fa-sign-out"></i> Log Out </a></li>


</ul>
</li>

</ul>
</div>
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<div class="page-sidebar navbar-collapse collapse">
<!-- BEGIN SIDEBAR MENU -->
<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
<li class="sidebar-toggler-wrapper hide">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="sidebar-toggler"> </div>
<!-- END SIDEBAR TOGGLER BUTTON -->
</li>
<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

<li class="nav-item start">
<a href="home.php" class="nav-link "><i class="icon-home"></i><span class="title">Dashboard</span></a>
</li>




<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-desktop"></i>
<span class="title">WebSite Control </span><span class="arrow "></span></a>

<ul class="sub-menu">

<li class="nav-item"><a href="setgeneral.php" class="nav-link"><i class="fa fa-cogs"></i> General Setting </a></li>
<li class="nav-item"><a href="sethome.php" class="nav-link"><i class="fa fa-cogs"></i> Home Setting </a></li>
<li class="nav-item"><a href="listmenu.php" class="nav-link"><i class="fa fa-desktop"></i> Menu Manager </a></li>
<li class="nav-item"><a href="legal.php" class="nav-link"><i class="fa fa-desktop"></i> Legal Information </a></li>
<li class="nav-item"><a href="sethomeslider.php" class="nav-link"><i class="fa fa-desktop"></i> Slider Images </a></li>
<li class="nav-item"><a href="setlogo.php" class="nav-link"><i class="fa fa-desktop"></i> Logo Setting </a></li>
<li class="nav-item"><a href="setfav.php" class="nav-link"><i class="fa fa-desktop"></i> Favicon Setting </a></li>
<li class="nav-item"><a href="setmail.php" class="nav-link"><i class="fa fa-envelope"></i> Email Setting </a></li>
<li class="nav-item"><a href="setdid.php" class="nav-link"><i class="fa fa-user"></i> SET DEFAULT ID </a></li>
<li class="nav-item"><a href="setchat.php" class="nav-link"><i class="fa fa-weixin"></i> SET LIVE CHAT </a></li>
<li class="nav-item"><a href="setloader.php" class="nav-link"><i class="fa fa-weixin"></i> SET PRE LOADER </a></li>
</ul>
</li>


<li class="nav-item">
	<a href="packege.php" class="nav-link ">
		<i class="fa fa-th"></i><span class="title">Package Management</span>
	</a>
</li>


<li class="nav-item">
	<a href="testimonial.php" class="nav-link ">
		<i class="fa fa-th"></i><span class="title">Testimonial Management</span>
	</a>
</li>



<li class="nav-item start">
<a href="listnews.php" class="nav-link "><i class="fa fa-newspaper-o"></i><span class="title">News Management</span></a>
</li>


                        
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-users"></i>
<span class="title">Staff Management</span><span class="arrow "></span></a>
							
<ul class="sub-menu">
<li class="nav-item"><a href="addstaff.php" class="nav-link"><i class="fa fa-user-plus"></i> Add New Staff </a></li>
<li class="nav-item"><a href="liststaff.php" class="nav-link"><i class="fa fa-users"></i> View Staffs </a></li>
		
</ul>
</li>


<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-users"></i>
<span class="title">Users Management</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li class="nav-item"><a href="adduser.php" class="nav-link"><i class="fa fa-plus"></i> Add New User </a></li>
<li class="nav-item"><a href="listuser.php" class="nav-link"><i class="fa fa-desktop"></i> View All Users </a></li>
<li class="nav-item"><a href="listblock.php" class="nav-link"><i class="fa fa-times"></i> View Blocked Users </a></li>
<li class="nav-item"><a href="MakeEligible.php" class="nav-link"><i class="fa fa-check"></i> Make User Eligible</a></li>
</ul>
</li>



<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-dollar"></i>
<span class="title">Donations</span><span class="arrow "></span></a>
<ul class="sub-menu">
<li class="nav-item"><a href="donation-a.php" class="nav-link"><i class="fa fa-desktop"></i>AWAITING DONATIONS
 </a></li>
<li class="nav-item"><a href="donation-s.php" class="nav-link"><i class="fa fa-search"></i> SEARCH DONATION</a></li>

</ul>
</li>





<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-ticket"></i>
<span class="title">Support Ticket </span><span class="arrow "></span></a>
<ul class="sub-menu">
<li class="nav-item"><a href="ticket-req.php" class="nav-link"><i class="fa fa-reply"></i> Response Required </a></li>
<li class="nav-item"><a href="ticket-all.php" class="nav-link"><i class="fa fa-th"></i> All Tickets</a></li>
</ul>
</li>



<li class="nav-item">
<a href="ipblock.php" class="nav-link "><i class="fa fa-times"></i><span class="title">BLOCK IP</span></a>
</li>




</ul>
<!-- END SIDEBAR MENU -->
<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->


