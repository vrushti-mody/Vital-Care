<!DOCTYPE html>
<html>
<head>
  <title>Product Description</title>
  <style type="text/css">
    /* Basic Styling */
html, body {
  height: 100%;
  width: 100%;
  margin: 0;
  font-family: 'Roboto', sans-serif;
}
 
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 25px;
  display: flex;
  background-color: #f2f2f2;
}
/* Columns */
.left-column {
  width: 35%;
  position: relative;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 50px;
}
 
.right-column {
  width: 65%;
  margin-top: 20px;
}
/* Left Column */
.left-column img {
  width: 100%;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  transition: all 0.3s ease;
}
 
.left-column img.active {
  opacity: 1;
}
/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
/* Product Price */
.product-price {
  display: flex;
  align-items: center;

  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  
}
.cart-btn:hover {
  background-color: #64af3d;
}
/* Responsive */

  </style>
</head>
<body>
<div class="container">
 
  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    
    <img data-image="red" class="active" src="admin.jpg" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span>Headphones</span>
      <h1>Beats EP</h1>
      <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
    </div>
 
    <!-- Product Configuration -->
    
 
     
      
     
 
    <!-- Product Pricing -->
    <div class="product-price">
      <p>Price:148$</p>
      
    </div>
    <br>
    <br>
    <a href="#" class="cart-btn">Add to cart</a>
  </div>
</body>
</html>