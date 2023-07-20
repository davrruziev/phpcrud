<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Bosh sahifa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Malumot kiritish</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="del.php">Malumot o'chirish</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upt.php">Malumotni taxrirlash</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upload.php">Fayl yuklash</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewfile.php">rasmlar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cabinet.php"><i class="fa fa-user"></i></a>
        </li>
        <?
        if (isset($_SESSION['auth'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i></a>
          </li>
        <?
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
          </li>
        <?
        }
        ?>

      </ul>
    </div>
  </div>
</nav>