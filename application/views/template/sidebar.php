<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="<?= base_url('home');?>"> <img alt="image" src="<?= base_url('assets/img/logo_pertamina.png'); ?>" class="header-logo" />
        </a>
        </div>
        <ul class="sidebar-menu">

        <!-- Query Menu-->
        <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
            ";
            $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- Looping Menu -->
        <?php 
            foreach ($menu as $m) : 
        ?>
            <li class="menu-header"><?= $m['menu']; ?></li>

        <!-- Query Sub Menu-->
        <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * FROM `user_sub_menu` WHERE `menu_id` = $menuId
                            AND `is_active` = 1
            ";
            $submenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- Looping Sub Menu -->
        <?php
            foreach ($submenu as $sm): 
        ?>
        <?php
            if($title == $sm['title']) :
        ?>
            <li class="dropdown active">
        <?php
            else :
        ?>
            <li class="dropdown">
        <?php
            endif ;
        ?>
                <a href="<?= base_url($sm['url']);?>" class="nav-link"><i data-feather="<?= $sm['icon']?>"></i><span><?= $sm['title'];?></span></a>
            </li>

        <?php
            endforeach;
        ?>

        <?php
            endforeach;
        ?>
        </ul>
    </aside>
</div>