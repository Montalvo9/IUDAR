

<!-- Información de Usuario -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php echo $_SESSION['nombre']; ?>
            </div>
            <div class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php echo $_SESSION['rol']; ?>
            </div>
            <img class="img-profile rounded-circle" src="/Rosario/img/undraw_profile.svg" width="30">
        </a>
    </li>
</ul>
