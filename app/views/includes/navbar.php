<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="#"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
        </li>
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo URLROOT; ?>/lists">Lists</a>
          </li>
      </ul>
    </div>
      <div>
              <a class="nav-link" href="<?php echo URLROOT; ?>/notifications">
                  <button type="button" class="btn btn-primary position-relative">
                      Notifications
                      <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                      </span>
                  </button>
              </a>
          </button>
      </div>
  </div>
</nav>