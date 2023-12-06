<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url() . $_SESSION['role'] . '/dashboard'; ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>All Users</span>
          </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() . $_SESSION['role'] . '/addUser'; ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Add User</span></a>
        </li>

      </ul>
