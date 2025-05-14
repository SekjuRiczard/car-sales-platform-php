<?php
// addAdvertisement.php
// Upewnij się, że sesja jest uruchomiona (jeśli potrzebujesz danych użytkownika)
// session_start();

// W razie potrzeby pobierz listę marek/generacji z bazy:
// $brands = [...];
// $generations = [...];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Dodaj ogłoszenie</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
  <link rel="stylesheet" href="style/addAdvertisement.css">
</head>
<body>
  <div class="add-ad-container">
    <h2>Dodaj nowe ogłoszenie</h2>
    <form action="/advertisement/create" method="POST" enctype="multipart/form-data" class="add-ad-form">

      <!-- Tytuł i opis -->
      <div class="form-group">
        <label for="title">Tytuł</label>
        <input type="text" id="title" name="title" required maxlength="100" />
      </div>

      <div class="form-group">
        <label for="description">Opis</label>
        <textarea id="description" name="description" rows="4" required></textarea>
      </div>

      <!-- Dane techniczne -->
      <div class="form-row">
        <div class="form-group">
          <label for="year">Rok produkcji</label>
          <input type="number" id="year" name="year" min="1900" max="<?= date('Y') ?>" required />
        </div>
        <div class="form-group">
          <label for="mileage">Przebieg (km)</label>
          <input type="number" id="mileage" name="mileage" min="0" required />
        </div>
        <div class="form-group">
          <label for="price">Cena (PLN)</label>
          <input type="number" id="price" name="price" min="0" step="0.01" required />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="gearbox">Skrzynia biegów</label>
          <select id="gearbox" name="gearbox" required>
            <option value="">— wybierz —</option>
            <option value="manual">Manualna</option>
            <option value="automatic">Automatyczna</option>
            <option value="semi-automatic">Półautomatyczna</option>
          </select>
        </div>
        <div class="form-group">
          <label for="condition">Stan pojazdu</label>
          <select id="condition" name="condition" required>
            <option value="">— wybierz —</option>
            <option value="sprawny">Sprawny</option>
            <option value="uszkodzony">Uszkodzony</option>
            <option value="po-wypadku">Po wypadku</option>
            <option value="do-odbudowy">Do odbudowy</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fuel">Paliwo</label>
          <select id="fuel" name="fuel" required>
            <option value="">— wybierz —</option>
            <option value="petrol">Benzyna</option>
            <option value="diesel">Diesel</option>
            <option value="electric">Elektryczny</option>
            <option value="hybrid">Hybryda</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="body">Nadwozie</label>
          <select id="body" name="body" required>
            <option value="">— wybierz —</option>
            <option value="sedan">Sedan</option>
            <option value="hatchback">Hatchback</option>
            <option value="kombi">Kombi</option>
            <option value="suv">SUV</option>
            <option value="coupe">Coupe</option>
            <option value="van">Van</option>
          </select>
        </div>
        <div class="form-group">
          <label for="brand">Marka</label>
          <input type="text" id="brand" name="brand" required />
          <!-- lub dynamiczne <select> -->
        </div>
        <div class="form-group">
          <label for="generation">Generacja</label>
          <input type="text" id="generation" name="generation" />
          <!-- lub dynamiczne <select> -->
        </div>
      </div>

      <!-- Upload zdjęć -->
      <div class="form-group">
        <label for="images">Zdjęcia (max 10)</label>
        <input 
          type="file" 
          id="images" 
          name="images[]" 
          accept="image/*" 
          multiple 
          data-max-files="10"
        />
        <small>Wybierz do 10 zdjęć</small>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn submit-btn">Zapisz ogłoszenie</button>
        <button type="reset" class="btn reset-btn">Wyczyść</button>
      </div>

    </form>
  </div>
</body>
</html>
