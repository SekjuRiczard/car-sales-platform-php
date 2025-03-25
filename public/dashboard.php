<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/dashboard.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Sidebar -->
    <nav class="sidebar">
      <!-- Logo + nazwa -->
      <div class="logoContainer">
        <img class="logo" src="assets/logo.png" alt="logo" />
        <h2 class="brandName">Auto Local</h2>
      </div>

      <!-- Sekcja Menu głównego -->
      <div class="menuSection">
        <p class="sectionTitle">Menu</p>
        <ul class="navList">
          <li class="navItem active">
            <a href="dashboard.php">
              <span class="material-icons">dashboard</span>
              Dashboard
            </a>
          </li>
          <li class="navItem">
            <a href="listing.php">
              <span class="material-icons">view_list</span>
              Listing
            </a>
          </li>
          <li class="navItem">
            <a href="calendar.php">
              <span class="material-icons">calendar_today</span>
              Calendar
            </a>
          </li>
          <li class="navItem">
            <a href="deals.php">
              <span class="material-icons">attach_money</span>
              Deals
            </a>
          </li>
          <li class="navItem">
            <a href="tracking.php">
              <span class="material-icons">location_on</span>
              Tracking
            </a>
          </li>
          <li class="navItem">
            <a href="bids.php">
              <span class="material-icons">gavel</span>
              Active Bids
            </a>
          </li>
          <li class="navItem">
            <a href="statistics.php">
              <span class="material-icons">bar_chart</span>
              Statistics
            </a>
          </li>
          <li class="navItem">
            <a href="transaction.php">
              <span class="material-icons">receipt_long</span>
              Transaction
            </a>
          </li>
        </ul>
      </div>

      <!-- Inna sekcja menu (opcjonalna) -->
      <div class="menuSection">
        <p class="sectionTitle">Other Menu</p>
        <ul class="navList">
          <li class="navItem">
            <a href="search.php">
              <span class="material-icons">search</span>
              Search
            </a>
          </li>
          <li class="navItem">
            <a href="settings.php">
              <span class="material-icons">settings</span>
              Settings
            </a>
          </li>
          <li class="navItem">
            <a href="help.php">
              <span class="material-icons">help_outline</span>
              Help Center
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Header -->
    <header>
      <div class="searchAndSwitch">
        <div class="searchbar">
          <div class="searchInputWrapper">
            <span class="material-icons search-icon">search</span>
            <input type="text" placeholder="Search..." />
          </div>
          <button>Search</button>
        </div>

        <div class="themeSwitch">
          <button class="themeOption active" data-theme="light">Light</button>
          <button class="themeOption" data-theme="dark">Dark</button>
        </div>
      </div>
      <div class="accountDetails">
        <!-- Zdjęcie użytkownika -->
        <img src="assets/logo.png" alt="Profile Picture" />
        <!-- Nazwa użytkownika -->
        <p>Hello User</p>
        <!-- Przycisk z datą -->
        <div class="date">25 March</div>
      </div>
    </header>

    <!-- Main content -->
    <main class="dashboardMain">
      <!-- Górny kontener z nagłówkiem, filtrami i przyciskiem -->
      <div class="dashboardHeader">
        <!-- Tytuł i krótki opis -->
        <div class="dashboardTitle">
          <h1>Dashboard</h1>
          <p>Filters</p>
        </div>

        <!-- Filtry (lokalizacja, daty, godziny) -->
        <div class="filtersContainer">
          <label for="marka">Brand:</label>
          <select name="marka" id="marka"></select>

          <label for="model">Model:</label>
          <select name="model" id="model"></select>

          <label for="cenaDo">Price from:</label>
          <select name="priceFrom" id="priceFrom"></select>

          <label for="cenaDo">Price to:</label>
          <select name="priceTo" id="priceTo"></select>

          <label for="cenaDo">Fuel type:</label>
          <select name="fuelType" id="fuelType"></select>

            <!-- Dodatkowe filtry - początkowo ukryte -->
            <div id="extraFilters" class="extraFilters" style="display: none;">

            <label for="yearFrom">Year from:</label>
            <select name="yearFrom" id="yearFrom"></select>

            <label for="yearTo">Year to:</label>
            <select name="yearTo" id="yearTo"></select>

            <label for="mileage">Mileage:</label>
            <select name="mileage" id="mileage"></select>

            <label for="transmision">Transmision:</label>
            <select name="transmision" id="transmision"></select>

            </div>
        </div>

          <button class="submitBtn" type="submit">
            <span class="material-symbols-outlined">directions_car</span>
            Update Offers
          </button>

          <!-- Przycisk do rozwijania dodatkowych filtrów -->
          <button id="moreFiltersBtn" class="submitBtn" type="button">
            <span class="material-symbols-outlined">filter_list</span>
            More Filters
          </button>
        </div>

        
      <!-- Sekcja dostępnych samochodów -->
      <div class="announcements">
        <h3>Available Cars</h3>
        <!-- Tutaj będą oferty samochodów -->
      </div>
    </main>

    <!-- Footer -->
    <footer></footer>

    <script src="js/dashboard.js"></script>
  </body>
</html>
