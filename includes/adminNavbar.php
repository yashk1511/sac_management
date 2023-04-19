<nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <a class="navbar-brand" href="#">IIT ISM ADMINISTRATOR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="adminIndex.php">Home</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="view_allotment_list.php">View Allotment</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="view_complaints.php">View Complaints</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="hostel_charges.php">Hostel Charges</a>
      </li>

    </ul>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"><i class="fa fa-user fa-2x"></i></a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">My Profile</a>
          <a class="dropdown-item" href="#">Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" id="userLogout" href="adminLogout.php">Log out</a>
        </div>
      </li>
    </ul>

  </div>
</nav>