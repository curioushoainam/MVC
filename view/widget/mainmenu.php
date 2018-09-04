<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php
                    // viewArr($menu); exit();
                    foreach ($menu as $item){
                        $active = isset($item) && $item ? $item['action'] : '';
                        // $alias = isset($item) && $item ? $item->alias : '';
                        $ten_menu = isset($item) && $item ? $item['ten'] : ''; 

                        $isActive = '';
                        if(isset($_GET['action']) && $_GET['action']){
                            if ($active == $_GET['action']){
                                $isActive = 'active';
                            }
                        } 
                    ?>
                    <!-- <li class="<?= $isActive ?>"><a href="?<?= $link ?>"><?= $ten_menu ?></a></li> -->
                    <li class="<?= $isActive ?>"><a href="<?= href($item['action'], $item, $seo) ?>"><?= $ten_menu ?></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>  
        </div>
    </div>
</div> <!-- End mainmenu area -->