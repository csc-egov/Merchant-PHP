<header>
	<div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="" width="48" height="48" /> Merchant <span class="highlight">.php</span></a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <?php 
                        session_start();
                    if(empty($_SESSION)){ ?>
                    <li><a href="login.php">Login</a></li>
                <?php }else{ ?>
                     <li><a href="logout.php">Logout</a></li>   
               <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</header>
