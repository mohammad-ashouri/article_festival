<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php
        $type = $_SESSION['head'];
        $query = mysqli_query($connection_maghalat, "select * from menus where access like '%$type%' order by level asc");
        foreach ($query as $menus) {
            if ($menus['Is_Parent'] == 0) {
                ?>
                <li class="nav-item">
                    <a href="<?php echo $menus['link'] ?>"
                       class="nav-link <?php $self = explode('/', $_SERVER['PHP_SELF']);
                       $self = end($self);
                       if ($self == $menus['link']) {
                           echo 'active';
                       } ?>">
                        <i class="fa <?php echo $menus['icon'] ?> nav-icon"></i>
                        <p><?php echo $menus['subject'] ?></p>
                    </a>
                </li>
                <?php
            } elseif ($menus['Is_Parent'] == 1 and $menus['childs'] != null and $menus['childs'] != '') {
                $childs = explode('|', $menus['childs']);
                ?>
                <li class="nav-item has-treeview <?php
                foreach ($childs as $child) {
                    $query = mysqli_query($connection_maghalat, "Select * from menus where id='$child' order by level asc");
                    foreach ($query as $list) {
                    }
                    $self = explode('/', $_SERVER['PHP_SELF']);
                    $self = end($self);
                    if ($list['link'] == $self) {
                        echo 'menu-open';
                    }
                }
                ?>">
                    <a href="#" class="nav-link <?php
                    foreach ($childs as $child) {
                        $query = mysqli_query($connection_maghalat, "Select * from menus where id='$child' order by level asc");
                        foreach ($query as $list) {
                        }
                        $self = explode('/', $_SERVER['PHP_SELF']);
                        $self = end($self);
                        if ($list['link'] == $self) {
                            echo 'active';
                        }
                    }
                    ?>">
                        <i class="nav-icon fa <?php echo $menus['icon']; ?>"></i>
                        <p>
                            <?php echo $menus['subject'] ?>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                        $childs = explode('|', $menus['childs']);
                        foreach ($childs as $child_list) {
                            $child_id = $child_list;
                            $query = mysqli_query($connection_maghalat, "select * from menus where id='$child_id' order by level asc");
                            foreach ($query as $Child_Info) {
                            }

                            ?>
                            <li class="nav-item">
                                <a href="<?php $self = explode('/', $_SERVER['PHP_SELF']);
                                $self = end($self);
                                if ($self == $Child_Info['link']) {
                                    echo '#';
                                } else{
                                    echo $Child_Info['link'];
                                }?>" class="nav-link <?php $self = explode('/', $_SERVER['PHP_SELF']);
                                $self = end($self);
                                if ($self == $Child_Info['link']) {
                                    echo 'active';
                                } ?>">
                                    <i class="fa
                                      <?php $self = explode('/', $_SERVER['PHP_SELF']);
                                    $self = end($self);
                                    if ($self == $Child_Info['link']) {
                                        echo 'fa-dot-circle-o';
                                    }else{
                                        echo 'fa-circle-o';
                                    }?>
                                      nav-icon"></i>
                                    <p><?php
                                        echo $Child_Info['subject'];
                                        ?></p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</nav>