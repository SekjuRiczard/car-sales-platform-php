
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Style i fonty -->
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
        <!-- Pasek wyszukiwania -->
        <div class="searchbar">
          <div class="searchInputWrapper">
            <span class="material-icons search-icon">search</span>
            <input type="text" placeholder="Search..." />
          </div>
          <button>Search</button>
        </div>

        <!-- Przycisk dodania ogłoszenia -->
        <div class="advertisementButton">
          <span class="material-symbols-outlined">campaign</span>
          <p>Add advertisement</p>
        </div>

        <!-- Przełącznik motywów -->
        <div class="themeSwitch">
          <button class="themeOption active" data-theme="light">Light</button>
          <button class="themeOption" data-theme="dark">Dark</button>
        </div>
      </div>

      <!-- Panel użytkownika (dla niezalogowanego) -->
      <div class="accountDetails">
        <div class="accountDetailsData">
          <span class="material-symbols-outlined icon">account_circle</span>
          <p id="userDataUsername">
          <a href="/accountDetails">Menage Account</a>
          </p>  
        </div>
      </div>
    </header>


    <!-- Main content -->
    <main class="dashboardMain">
      <!-- Dashboard Header z filtrami -->
      <div class="dashboardHeader">
        <!-- Tytuł i opis dashboardu -->
        <div class="dashboardTitle">
          <h1>Dashboard</h1>
          <p>Filters</p>
        </div>

  <form class="filtersContainer">
  <!-- Brand -->
  <select name="brand" id="brand">
    <option value="" disabled selected hidden>Brand</option>
    <!-- Dalsze opcje ładujesz w JS (loadCarBrands) lub statycznie -->
  </select>

  <!-- Model -->
  <select name="model" id="model">
    <option value="" disabled selected hidden>Model</option>
  </select>

   <!-- GENERATION -->
   <select name="generation" id="generation">
    <option value="" disabled selected hidden>Generation</option>
  </select>

  <!-- Price from -->
  <select name="priceFrom" id="priceFrom">
    <option value="" disabled selected hidden>Price from</option>
    <?php
      for ($i = 0; $i <= 1000000;) {
        echo "<option value=\"$i\">$i</option>";
        if ($i < 100000) {
          $i += 10000;
        } else {
          $i += 50000;
        }
      }
    ?>
  </select>

  <!-- Price to -->
  <select name="priceTo" id="priceTo">
    <option value="" disabled selected hidden>Price to</option>
    <?php
      for ($i = 0; $i <= 1000000;) {
        echo "<option value=\"$i\">$i</option>";
        if ($i < 100000) {
          $i += 10000;
        } else {
          $i += 50000;
        }
      }
    ?>
  </select>

  <!-- Fuel Type -->
  <select name="fuelType" id="fuelType">
    <option value="" disabled selected hidden>Fuel type</option>
    <option value="Petrol">Petrol</option>
    <option value="Diesel">Diesel</option>
    <option value="Electric">Electric</option>
    <option value="Hybrid">Hybrid</option>
  </select>

  <!-- Year from -->
  <select name="yearFrom" id="yearFrom">
    <option value="" disabled selected hidden>Year from</option>
    <?php 
      for ($i = 1950; $i <= 2025; $i++ ) {
        echo "<option value=\"$i\">$i</option>";
      }
    ?>
  </select>

  <!-- Year to -->
  <select name="yearTo" id="yearTo">
    <option value="" disabled selected hidden>Year to</option>
    <?php 
      for ($i = 1950; $i <= 2025; $i++ ) {
        echo "<option value=\"$i\">$i</option>";
      }
    ?>
  </select>

  <!-- Mileage From -->
  <select name="mileageFrom" id="mileageFrom">
    <option value="" disabled selected hidden>Mileage from</option>
    <?php
      for ($i = 0; $i <= 1000000;) {
        echo "<option value=\"$i\">$i</option>";
        if ($i < 100000) {
          $i += 10000;
        } else {
          $i += 100000;
        }
      }
    ?>
  </select>

  <!-- Mileage To -->
  <select name="mileageTo" id="mileageTo">
    <option value="" disabled selected hidden>Mileage to</option>
    <?php
      for ($i = 0; $i <= 1000000;) {
        echo "<option value=\"$i\">$i</option>";
        if ($i < 100000) {
          $i += 10000;
        } else {
          $i += 100000;
        }
      }
    ?>
  </select>

  <!-- Transmission -->
  <select name="transmision" id="transmision">
    <option value="" disabled selected hidden>Transmission</option>
    <option value="Automatic">Automatic</option>
    <option value="Manual">Manual</option>
  </select>

  <!-- Przycisk -->
  <button class="submitBtn" type="submit">
    <span class="material-symbols-outlined">directions_car</span>
    Update Offers
  </button>
</form>

      </div>

      <!-- Sekcja ogłoszeń -->
      <div class="announcements">
        <h3>Available Cars</h3>
        <div class="annoucment">
          <div class="annoucmentMain">
            <img src="assets/audi1.jpg" alt="car photo" />
            <h3>Car model</h3>
          </div>
          <div class="annoucmentDesc">
            <p>Brand: <strong>Brand</strong></p>
            <p>Body: <strong>Body</strong></p>
            <p>Fuel: <strong>Fuel</strong></p>
          </div>
          <div class="annoucmentPrice">
            <h2>Price <strong>200.000</strong> $</h2>
            <button class="submitBtn">Check Details</button>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer></footer>

    <!-- Skrypty JS -->
    <script src="js/dashboard.js"></script>
  </body>
</html>
