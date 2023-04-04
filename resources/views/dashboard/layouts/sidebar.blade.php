<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center text-muted mt-5 ms-5 mb-0">
        <span>Administrator</span>
      </h6>
        <div class="position-sticky sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item ">
              <a class="nav-link {{ Request::is('dashboard*') ? 'active' : ' ' }}" aria-current="page" href="/dashboard">
                <span data-feather="user" class="align-text-bottom"></span>
                Kelola Santri
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link {{ Request::is('ustad*') ? 'active' : ' ' }}" aria-current="page" href="/ustad">
                <span data-feather="user-check" class="align-text-bottom"></span>
                Kelola Ustad
              </a>
            </li>
          </ul>
        </div>


 </nav>