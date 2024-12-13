
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="{{ asset('css/dash.css') }}" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Esportify Admin | Jadwal</title>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-category"></i>
         <span class="logo_name">Esportify</span>
      </div>
      <ul class="nav-links">
         <li>
            <a href="{{ route('team.index')}}">
               <i class="bx bx-box"></i>
               <span class="links_name">Tim Esports</span>
            </a>
         </li>
         <li>
            <a href="{{ route('jadwal.index')}}">
               <i class="bx bx-list-ul"></i>
               <span class="links_name">Jadwal</span>
            </a>
         </li>
         <li>
            <a href="">
               <i class="bx bx-log-out"></i>
               <span class="links_name">Log out</span>
            </a>
         </li>
      </ul>
   </div>
   <section class="home-section">
      <nav>
         <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
         </div>
         <div class="profile-details">
            <span class="admin_name">Esportify Admin</span>
         </div>
      </nav>
      <div class="home-content">
         @yield('content')
      </div>
   </section>
   <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
         sidebar.classList.toggle("active");
         if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
         } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
      function showDetails(tanggal, tim, player, status) {
         alert(`Tanggal: ${tanggal}\nTim: ${tim}\nPlayer: ${player}\nStatus: ${status}`);
      }
   </script>
</body>

</html>
