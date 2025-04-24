<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Panel użytkownika</title>

  <!-- Czcionki i ikony -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="style/logout.css" />
</head>
<body>
  <div class="main">
    <div class="tiles">
      <!-- Kafelek profilu -->
      <div class="tile profile-tile">
        <div class="profile-info">
          <img class="avatar" src="https://via.placeholder.com/60" alt="Avatar"/>
          <span class="username">dawid123</span>
        </div>
        <details class="dropdown">
          <summary>
            <span class="material-symbols-outlined">more_vert</span>
          </summary>
          <ul class="dropdown-menu">
            <li><button class="dropdown-item">Log out</button></li>
          </ul>
        </details>
      </div>

      <!-- Kafelek ogłoszeń -->
      <div class="tile ads-tile">
        <h3>Twoje ogłoszenia</h3>

        <div class="ad-item">
          <div class="ad-info">
            <h4 class="ad-title">Sprzedam samochód</h4>
            <p class="ad-desc">Świetny stan, 100 000 km, rok 2018.</p>
          </div>
          <details class="dropdown">
            <summary>
              <span class="material-symbols-outlined">more_vert</span>
            </summary>
            <ul class="dropdown-menu">
              <li><button class="dropdown-item">Edytuj ogłoszenie</button></li>
            </ul>
          </details>
        </div>

        <div class="ad-item">
          <div class="ad-info">
            <h4 class="ad-title">Wynajmę mieszkanie</h4>
            <p class="ad-desc">Dwupokojowe, centrum, dostępne od zaraz.</p>
          </div>
          <details class="dropdown">
            <summary>
              <span class="material-symbols-outlined">more_vert</span>
            </summary>
            <ul class="dropdown-menu">
              <li><button class="dropdown-item">Edytuj ogłoszenie</button></li>
            </ul>
          </details>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    © 2025 Twoja Aplikacja. Wszelkie prawa zastrzeżone.
  </footer>
</body>
</html>
