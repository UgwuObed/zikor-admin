<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Offside&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <title>Zikor</title>
    
</head>
<body>
	<div class="dashboard-container">
  <div class="gray-background">
    <div class="left-side">
      <div class="logo-container">
        <img src="{{ asset('images/zikor-logo.png') }}" alt="Logo" width="100" height="50" />
        <div class="icons-container">
          <ul>
            <li><a href="#"><img src="{{ asset('images/home.png') }}" alt="Home" width="25" height="25" /> <span class="nav-text">Home</span></a></li>
            <li><a href="#"><img src="{{ asset('images/noti.png') }}" alt="Notification" width="25" height="25" /> <span class="nav-text">Notification</span></a></li>
            <li><a href="#"><img src="{{ asset('images/setting.png') }}" alt="Settings" width="25" height="25" /> <span class="nav-text">Settings</span></a></li>
            <li><a href="#"><img src="{{ asset('images/sms.png') }}" alt="Help" width="25" height="25" /> <span class="nav-text">Help</span></a></li>
            <li><a href="#"><img src="{{ asset('images/call.png') }}"alt="Contact Us" width="25" height="25" /> <span class="nav-text">Contact Us</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="profilePage">
    <a href="/profile">Profile</a>
  </div>
  <div class="center">
    <ul class="list-items">
      <li class="active"><a href="#">Dashboard</a></li>
      <li>
        <a href="/product">Products</a>
      </li>
      <li><a href="#">Order</a></li>
      <li><a href="#">Completed</a></li>
    </ul>
  </div>
  <div class="boxes-container">
    <div class="box">
      <h2><img src="{{ asset('images/sales.png') }}" alt="sales" width="25" height="25" /> <span class="box-text">Total Sales </span> </h2>
      <p>&#8358; 120,000</p>
    </div>
    <div class="box">
      <h2><img src="{{ asset('images/orders.png') }}" alt="orders" width="25" height="25" /> <span class="box-text">Total Orders </span> </h2>
      <p>1200</p>
    </div>
    <div class="box">
      <h2><img src="{{ asset('images/found.png') }}" alt="found" width="25" height="25" /> <span class="box-text">Total Found </span> </h2>
      <p>30,00</p>
    </div>
    <div class="box">
      <h2><img src="{{ asset('images/products.png') }}" alt="products" width="25" height="25" /> <span class="box-text">Total Product</span> </h2>
      <p>4,500</p>
    </div>
  </div>
  <div class="rectangle-container">
    <div class="rectangle rectangle-left">
      <div class="rectangle-content">
        <h3 class="rectangle-sales">Top Sale:</h3>
        <img src="{{ asset('images/nike.jpg') }}" alt="Image" class="rectangle-image" />
        <h3 class="rectangle-title">Nike Air Force 1</h3>
        <p class="rectangle-description">Dunk</p>
        <p class="rectangle-description1">Size: 43</p>
        <p class="rectangle-description2">Color: Black</p>
        <button class="share-button">Share</button>
      </div>
    </div>
  </div>
  <div class="srectangle-container">
    <div class="srectangle rectangle-left">
      <div class="srectangle-content">
        <h3 class="srectangle-title">Recent Order:</h3>
        <img src="{{ asset('images/polo.jpg') }}" alt="Image" class="srectangle-image" />
        <h3 class="srectangle-title">T-shirt Polo</h3>
        <p class="srectangle-description">For men</p>
        <p class="srectangle-description1">Size: XL</p>
        <p class="srectangle-description2">Color: Gray</p>
        <button class="sshare-button">Share</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
