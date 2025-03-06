<?php include 'koneksi.php'; ?>
    <div class="header">
        <div class="top">
          <div class="nama">
            <p class="navbar-text">Halo !!</p>
          </div>
          <div class="text">
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i> | <p id="show-login">Login</p>
          </div>
        </div>
        <nav>
          <div class="logo">
            <h1>TOP</h1>
            <h4>Laundry</h4>
          </div>
          <ul>
            <li><a href="#" class="nav-link">Home</a></li>
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#service" class="nav-link">Service</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
            <li>
                <a href="" class="nav-link" id="pesan">Pesan</a>
                <div class="down">
                    <ul>
                        <li><a href="pesan/index.php">Cek Pesanan</a></li>
                        <li><a href="pesan/ts_tambah.php">Pesan Laundry</a></li>
                    </ul>
                </div>
            </li>
          </ul>
        </nav>
      

        <div class="wrapper">
            <div class="close-btn"><p>&times;</p></div>
            <div class="form-wrapper sign-in">
              <form action="asset/login.php" class="pp" method="post">
                <h2>Login</h2>
                <div class="input-group">
                  <label for="">Username</label>
                  <input type="text" name="username" required>
                  <div class="imj"><img src="img/username.png" width="20px"></div>
                </div>
                <div class="input-group">
                  <label for="">Password</label>
                  <input type="password" name="password" required>
                  <div class="imj"><img src="img/key.png" width="20px"></div>
                </div>
                <button type="submit">Login</button>
                <div class="signUp-link">
                  <p>Belum punya akun? <a href="#" class="signUpBtn-link">Sign Up</a></p>
                </div>
              </form>
            </div>
            <div class="form-wrapper sign-up">
              <form action="asset/signup.php" class="pp" method="post">
                <h2>Sign Up</h2>
                <div class="input-group">
                  <label for="">Username</label>
                  <input type="text" name="username" required>
                  <div class="imj"><img src="img/username.png" width="20px"></div>
                </div>
                <div class="input-group">
                  <label for="">Email</label>
                  <input type="email" name="email" required>
                  <div class="imj"><img src="img/email.png" width="20px"></div>
                </div>
                <div class="input-group">
                  <label for="">Password</label>
                  <input type="password" name="password" required>
                  <div class="imj"><img src="img/key.png" width="20px"></div>
                </div>
                <button type="submit">Sign Up</button>
                <div class="signUp-link">
                  <p>Sudah punya akun? <a href="#" class="signInBtn-link">Sign In</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
    <script src="js/login.js"></script>
