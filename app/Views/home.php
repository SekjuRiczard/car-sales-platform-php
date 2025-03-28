<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ogłoszenia Samochodowe</title>
  <style>
    /* Reset podstawowy */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      color: #333;
    }
    a {
      text-decoration: none;
      color: inherit;
    }

    /* NAVBAR */
    .navbar {
      background-color: #0052cc; /* główny niebieski */
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem 2rem;
    }
    .navbar .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }
    .navbar .nav-links {
      display: flex;
      gap: 1rem;
    }
    .navbar .nav-links a {
      background-color: rgba(255, 255, 255, 0.2);
      padding: 0.5rem 1rem;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    .navbar .nav-links a:hover {
      background-color: rgba(255, 255, 255, 0.4);
    }

    /* KONTAINER NA FORMULARZ */
    .search-section {
      background-color: #fff;
      margin: 1rem auto;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 1200px;
    }
    .search-section h2 {
      font-size: 1.2rem;
      margin-bottom: 1rem;
    }

    /* PASEK OPCJI (np. osobowe, dostawcze) – w razie potrzeby */
    .option-bar {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .option-bar button {
      background-color: #f2f2f2;
      border: none;
      padding: 0.75rem 1rem;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .option-bar button:hover {
      background-color: #e6e6e6;
    }

    /* FORMULARZ WYSZUKIWANIA */
    .search-form {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: flex-end;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      min-width: 120px; /* minimalna szerokość pola */
      flex: 1;         /* aby pola równomiernie się rozciągały */
    }
    .form-group label {
      font-size: 0.9rem;
      margin-bottom: 0.3rem;
      font-weight: bold;
    }
    .form-group input,
    .form-group select {
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    /* Specjalny układ dla pól od–do (przebieg, rok) */
    .form-group-inline {
      display: flex;
      gap: 0.5rem;
      align-items: center;
    }
    .form-group-inline input {
      width: 80px; /* zawężenie pól od/do */
    }

    /* PRZYCISK WYSZUKAJ */
    .search-button {
      background-color: #0052cc;
      color: #fff;
      padding: 0.7rem 1.5rem;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 0.2rem;
    }
    .search-button:hover {
      background-color: #003d99;
    }

    /* LINK DO ZALET: np. "Wyszukiwanie zaawansowane" */
    .advanced-search {
      margin-top: 1rem;
      text-align: right;
      font-size: 0.9rem;
    }
    .advanced-search a {
      color: #0052cc;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="logo">LOGO</div>
    <div class="nav-links">
      <a href="#">Login</a>
      <a href="/register">Register</a>
    </div>
  </nav>

  <!-- GŁÓWNA SEKCJA WYSZUKIWANIA -->
  <section class="search-section">
    <!-- (opcjonalnie) Tytuł, np. "Znajdź swój samochód" -->
    <h2>Znajdź swój samochód</h2>

    <!-- (opcjonalnie) Pasek z kategoriami, np. Samochody, Dostawcze, Motocykle -->
    <div class="option-bar">
      <button>Osobowe</button>
      <button>Dostawcze</button>
      <button>Motocykle</button>
    </div>

    <!-- Formularz wyszukiwania -->
    <form class="search-form" action="#" method="get">
      <div class="form-group">
        <label for="car_brand">Marka pojazdu</label>
        <input type="text" id="car_brand" name="car_brand" placeholder="np. Audi">
      </div>
      <div class="form-group">
        <label for="car_model">Model pojazdu</label>
        <input type="text" id="car_model" name="car_model" placeholder="np. A4">
      </div>
      <div class="form-group">
        <label for="type">Typ</label>
        <select id="type" name="type">
          <option value="">Dowolny</option>
          <option value="new">Nowy</option>
          <option value="used">Używany</option>
        </select>
      </div>
      <div class="form-group">
        <label for="gearbox">Skrzynia biegów</label>
        <select id="gearbox" name="gearbox">
          <option value="">Dowolna</option>
          <option value="manual">Manualna</option>
          <option value="automatic">Automatyczna</option>
        </select>
      </div>
      <div class="form-group">
        <label>Przebieg (km)</label>
        <div class="form-group-inline">
          <input type="number" name="milage_from" placeholder="od">
          <input type="number" name="milage_to" placeholder="do">
        </div>
      </div>
      <div class="form-group">
        <label>Rok</label>
        <div class="form-group-inline">
          <input type="number" name="year_from" placeholder="od">
          <input type="number" name="year_to" placeholder="do">
        </div>
      </div>
      <div class="form-group">
        <label for="body">Nadwozie</label>
        <input type="text" id="body" name="body" placeholder="np. Sedan">
      </div>

      <!-- Przycisk Wyszukaj -->
      <button type="submit" class="search-button">Pokaż ogłoszenia</button>
    </form>

    <!-- Link do zaawansowanego wyszukiwania (opcjonalny) -->
    <div class="advanced-search">
      <a href="#">Wyszukiwanie zaawansowane</a>
    </div>
  </section>

</body>
</html>
