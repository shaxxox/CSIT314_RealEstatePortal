<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="home.php" class="logo" style = "font-weight: bolder;"><i class="fa-solid fa-house-chimney"></i><i class="fas fa-building"></i></i>Rent Estate Portal</a>

         <ul>
            <li><a href="post_property.php"> + Create New Property Listing</a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">View Property<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="listings.php">All Listings</a></li>
                     <li><a href="search.php">Filter Search</a></li>
                  </ul>
               </li>
               <li><a href="#">My Listing<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">My Dashboard</a></li>
                     <li><a href="post_property.php">Create New Property</a></li>
                     <li><a href="my_listings.php">Manage Property</a></li>
                  </ul>
               </li>
               <li><a href="#">Help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">About Us</a></i></li>
                     <li><a href="contact.php">Contact Us</a></i></li>
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                  </ul>
            </li>
            </ul>
         </div>

         <ul>
            <li><a href="saved.php">Saved <i class="far fa-heart"></i></a></li>
            <li><a href="#">Account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">Login Now</a></li>
                  <li><a href="register.php">Register New</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">Update Profile</a></li>
                  <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">Logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>

<!-- header section ends -->