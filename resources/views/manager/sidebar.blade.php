<div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
         <a class="navbar-brand" style="color:#FFFFFF"><img src="../images/mark.png" alt="">BeautifulHair </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li <?php if($kind == "dashborad"){?>class="active "<?php }?>>
            <a href="/manager/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li <?php if($kind == "userinfo"){?>class="active "<?php }?>>
            <a href="/manager/userinfo">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Info</p>
            </a>
          </li>
          <li <?php if($kind == "orderinfo"){?>class="active "<?php }?>>
            <a href="/manager/orderinfo">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Order info</p>
            </a>
          </li>
          <li <?php if($kind == "notifications"){?>class="active "<?php }?>>
            <a href="">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li <?php if($kind == "userprofile"){?>class="active "<?php }?>>
            <a href="/manager/userprofile">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Admin Profile</p>
            </a>
          </li>
         
          <li <?php if($kind == "upgrade"){?>class="active "<?php }?>>
            <a href="">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li>
        </ul>
      </div>
    </div>