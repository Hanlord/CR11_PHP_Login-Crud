<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="padding-inline:4rem;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="https://cdn.pixabay.com/photo/2013/07/12/18/20/cat-153308__340.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="../home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../logout.php">Sign Out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="../index.php">Login</a>
        </li>
        <form method='GET' action="../senior.php">
          <input class='btn btn-success' type='submit' name='submit2' value='senior'>
        </form>
      </ul>
    </div>
  </div>
</nav>