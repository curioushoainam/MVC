<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul> 
                         <?php //viewArr($_SESSION) ?>               
                        <li><a href="#"><i class="fa fa-user"></i><?= isset($_SESSION['account']) ? $_SESSION['account'] : 'account' ?></a></li>                        
                        <li><a href="?controller=donhang&action=cart"><i class="fa fa-cart"></i> My Cart</a></li>
                        <li><a href="?controller=donhang&action=checkout"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="?controller=hethong&action=register"><i class="fa fa-user"></i> Register</a></li>
                        <?php $isNone = isset($_SESSION['login']) && $_SESSION['login'] ? '' : 'none' ?>
                        <li style = "display:<?= isset($_SESSION['login']) && $_SESSION['login'] ? 'none' : '' ?>"><a href="?controller=hethong&action=login"><i class="fa fa-user"></i>Login</a></li>
                        <li style = "display:<?= isset($_SESSION['login']) && $_SESSION['login'] ? '' : 'none' ?>"><a href="#" id="logout"><i class="fa fa-user"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<script src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // alert('reload');
    $(document).on("click","#logout", function(event){       
        event.preventDefault();
        $.ajax({
            url: '/MVC/view/hethong/logout.php',
            type : 'post',
            dataType : 'text',
            data :{
                logout : true
            },
            success : function(response){
                alert(response);
                window.location.reload();
            },
            error : function(jqXHR, textStatus, errorThrown){
                // alert(textStatus);
        }
        });
        return false;
    });


});


</script>