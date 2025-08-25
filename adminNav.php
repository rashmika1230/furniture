<nav class="navbar navbarad navbar-expand-lg fixed-top bg-dark">
    <div class="container-fluid">
        <div class=" mb-2 mb-lg-0">
          <button class="btn btn-outline-secondary tb1" id="sidebarToggle" type="button">
                <span class="navbar-arrow-icon"></span>
            </button>  
        </div>


            <div class="h3 me-auto mb-2 mb-lg-0 m-auto">
                <p>Admin Panel</p>
            </div>
    </div>
            
        </nav>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#sidebarToggle').on('click', function() {
                $('#sidebarMenu').toggleClass('collapsed');
                $('.content').toggleClass('collapsed');
            });
        });
        </script>