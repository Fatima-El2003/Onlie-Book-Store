<header class="header">
    <div class="flex">
        <div class="logo">
        <a href="admin_page.php">Admin <span>Panel</span></a></div>
        <nav class="navbar">
            <a href="admin_page.php">Home</a>
            <a href="admin_products.php">Products</a>
            <a href="admin_orders.php">Orders</a>
            <a href="admin_users.php">Users</a>
            <a href="admin_contacts.php">Contact</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="account-box">
            <p>Username: <span><?php echo $_SESSION['admin_name'];?></span></p>
            <p>Email: <span><?php echo $_SESSION['admin_email'];?></span></p>
            <a href="logout.php" class="delete-btn logout">Logout</a>
        </div>
    </div>
</header>