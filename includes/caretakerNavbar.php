<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">IIT ISM Caretaker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="addstaff.php">Add Staff</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="deletestaff.php">Delete Staff</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">Leave Data</a>
      </li>

    </ul>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"><i class="fa fa-user fa-2x"></i></a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">My Profile</a>
          <a class="dropdown-item" href="#">Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" id="userLogout" href="../logout.php">Log out</a>
        </div>
      </li>
    </ul>

  </div>
</nav>