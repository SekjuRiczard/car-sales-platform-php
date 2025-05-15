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
            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
          </select>
        </div>
        <div class="form-group">
          <label for="condition">Stan pojazdu</label>
          <select id="condition" name="condition" required>
            <option value="">— wybierz —</option>
            <option value="Drive Ready">Drive Ready</option>
            <option value="Damaged">Damaged</option>
            <option value="To Be Scrapped">To Be Scrapped</option>
          </select>
        </div>
        <div class="form-group">
          <label for="fuel">Paliwo</label>
          <select id="fuel" name="fuel" required>
            <option value="">— wybierz —</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Electric">Electric</option>
            <option value="Hybrid">Hybrid</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="body">Nadwozie</label>
          <select id="body" name="body" required>
            <option value="">— wybierz —</option>
            <option value="Sedan">Sedan</option>
            <option value="Hatchback">Hatchback</option>
            <option value="Combi">Combi</option>
            <option value="Suv">SUV</option>
            <option value="Coupe">Coupe</option>
            <option value="Cabrio">Cabrio</option>
          </select>
        </div>
        <select name="car_brand" id="brand">
        <option value="" disabled selected hidden>Brand</option>
        <!-- Dalsze opcje ładujesz w JS (loadCarBrands) lub statycznie -->
        </select>

        <!-- Model -->
        <select name="model_id" id="model">
          <option value="" disabled selected hidden>Model</option>
        </select>

        <!-- GENERATION -->
        <select name="car_generation" id="generation">
          <option value="" disabled selected hidden>Generation</option>
        </select>
      </div>

      <!-- Upload zdjęć -->
      <div class="form-group">
        <label for="images">Photos</label>
        <input 
          type="file" 
          id="images" 
          name="images[]" 
          accept="image/*" 
          multiple 
          data-max-files="10"
        />
      </div>

      <div class="form-actions">
        <button type="submit" class="btn submit-btn">Add advertisement</button>
        <button type="reset" class="btn reset-btn">Wyczyść</button>
      </div>

    </form>
  </div>
  <script type="module" src="js/addAdvertisement.js"></script>
</body>
</html>
