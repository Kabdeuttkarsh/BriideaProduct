<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($user_permission): ?>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="userMainNav">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
               <!--  <?php if(in_array('createUser', $user_permission)): ?>
                <li id="createUserSubNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Add User</a></li>
                <?php endif; ?> -->

                <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                <li id="manageUserSubNav"><a href="<?php echo base_url('user') ?>"><i class="fa fa-circle-o"></i> Manage Users</a></li>
              <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          
             <?php if(in_array('createDesignation', $user_permission) || in_array('updateDesignation', $user_permission) || in_array('viewDesignation', $user_permission) || in_array('deleteDesignation', $user_permission)): ?>
            <li class="treeview" id="DesignationMainNav">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Designations</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <!--   <?php if(in_array('createDesignation', $user_permission)): ?>
                  <li id="createDesignationSubMenu"><a href="<?php echo base_url('designations/create') ?>"><i class="fa fa-circle-o"></i> Add Designation</a></li>
                <?php endif; ?> -->
                <?php if(in_array('updateDesignation', $user_permission) || in_array('viewDesignation', $user_permission) || in_array('deleteDesignation', $user_permission)): ?>
                <li id="manageDesignationSubMenu"><a href="<?php echo base_url('designations') ?>"><i class="fa fa-circle-o"></i> Manage Designations</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
        
        <!-- <li class="header">Settings</li> -->
        <?php if(in_array('createCompany', $user_permission) || in_array('updateCompany', $user_permission) || in_array('viewCompany', $user_permission) || in_array('deleteCompany', $user_permission)): ?>
          <li id="companyMainNav"><a href="<?php echo base_url('Companies/') ?>"><i class="fa fa-simplybuilt"></i> <span>Companies</span></a></li>
        <?php endif; ?>

            <!-- <li class="header">Settings</li> -->
        <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
          <li id="groupMainNav"><a href="<?php echo base_url('ChatGroups/') ?>"><i class="fa fa-comment"></i> <span>Chat Groups</span></a></li>
        <?php endif; ?>


 
        <?php endif; ?>
        
         

      
        <!--   <?php if(in_array('createOnetoOneChat', $user_permission) || in_array('updateOnetoOneChat', $user_permission) || in_array('viewOnetoOneChat', $user_permission) || in_array('deleteOnetoOneChat', $user_permission)): ?>
            <li class="treeview" id="userMainNav">
              <a href="#">
                <i class="fa fa-comment"></i>
                <span>One to One Chat</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <input type="text" name="txt_search" class="form-control" autocomplete="off" placeholder="Search User" id="search">

                <?php if(in_array('createOnetoOneChat', $user_permission) || in_array('updateOnetoOneChat', $user_permission) || in_array('viewOnetoOneChat', $user_permission) || in_array('deleteOnetoOneChat', $user_permission)): ?>
                 
                  <div id="showUserListforChat">

                  </div>

                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?> -->

<!-- 
          <?php if(in_array('createGroupChat', $user_permission) || in_array('updateGroupChat', $user_permission) || in_array('viewGroupChat', $user_permission) || in_array('deleteGroupChat', $user_permission)): ?>
            <li class="treeview" id="groupMainNav">
              <a href="#">
                <i class="fa fa-comment"></i>
                <span>Group Chat</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <input type="text" name="txt_search" class="form-control" autocomplete="off" placeholder="Search Group" id="search">

                <?php if(in_array('createGroupChat', $user_permission) || in_array('updateGroupChat', $user_permission) || in_array('viewGroupChat', $user_permission) || in_array('deleteGroupChat', $user_permission)): ?>
                 
                  <div id="showGroupListforChat">

                  </div>

                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?> -->

<!-- 
    <li><a href="<?php echo base_url('ChatGroups/newWindow') ?>"><i class="fa fa-comment"></i> <span>User Chat</span></a></li> -->
  
    <li><a href="<?php echo base_url('ChatGroups/newWindowGroup') ?>"><i class="fa fa-comment"></i> <span>Chat</span></a></li>


    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
   




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>