    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">

        <div class="container">

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <a class="navbar-brand" href="<?php echo site_url('welcome'); ?>">

                <strong>Rumah Singgah</strong>

            </a>

            <div class="collapse navbar-collapse" id="navbarNav1">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a href="<?php echo site_url('welcome/filterdonasi') ?>" class="nav-link">Galang-Go</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('welcome/filterkegiatan') ?>" class="nav-link">Smile-Go</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('welcome/filterartikel') ?>" class="nav-link">Educate-Go</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('user/add') ?>" class="nav-link">Daftarkan Rumah Singgah || Free</a>
                    </li>                    
                    <?php if ($this->ion_auth->logged_in()): ?>
                    <li class="nav-item dropdown btn-group">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong><b><?php echo $_SESSION['identity'] ?></b></strong> </a>
                        <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                            <a class="dropdown-item" href="<?php echo site_url('user') ?>">Dashboard</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">

                        <a href="<?php echo site_url('auth'); ?>" class="nav-link">Login</a>

                    </li>
                    <?php endif ?>
                </ul>

            </div>

        </div>

    </nav>

    <!--/.Navbar-->