<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Simply</title>
     <link rel="stylesheet" type="text/css" href="nav.css">

     <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
 
<body>
    <header>
    <div class="wrapper">
        <h1>Vital Care<span class="color">.</span></h1>
        <nav>
            
               <ul>
                <li><a href="addproduct.php">Add Product</a></li>
                <li><a href="viewproducts.php">View Products</a></li>
                <li><a href="viewmessages.php">View Messages</a></li>
                 <li><a href="createblog.php">Add Blog</a></li>
                <li><a href="editblog.php">Edit Blogs</a></li>
               
            </ul>
           
        </nav>
    </div>
</header>
<div id="hero-image">
    <div class="wrapper">
        <h2>Welocme <!--  <?php echo $_SESSION['username1']?>! --><br/>
        <strong>To the admin site of Vital care.</strong></h2>
        <a href="#" class="button-1">Log Out</a>
    </div>
</div>
<div id="secondary-content">
    <div class="wrapper">
        <article style="background-image: url('admin.jpg');">
            <div class="overlay">
                <h4>Blogs</h4>
                <p><small>Write and edit blogs that will feature on your webiste.</small></p>
                <a href="#" class="more-link">Add Blog</a>
            </div>
        </article>
      

        <article style="background-image: url('admin.jpg');">
            <div class="overlay">
                <h4>Products</h4>
                <p><small>Add and edit the products that will feature on your website.</small></p>
                <a href="#" class="more-link">Add Product</a>

            </div>
        </article>
        
        <div class="clear"></div>
    </div>
</div>
<div id="cta">
    <div class="wrapper">
        <h3>Messages</h3>
        <p>Go through the messages that people leave on your website and get connected with them.</p>
        <a href="#" class="button-2">View Messages</a>
    </div>
</div>
</body>
</html>