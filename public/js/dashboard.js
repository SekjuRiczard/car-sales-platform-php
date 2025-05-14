// Pobieramy elementy z DOM
const moreFiltersBtn = document.getElementById('moreFiltersBtn');
const extraFilters   = document.getElementById('extraFilters');
const brandsList     = document.getElementById('brand');
const modelsList     = document.getElementById('model');
const generationsList = document.getElementById('generation');
const userDataUsername = document.getElementById('userDataUsername');
// Ustawienie nazwy użytkownika z lokalnego storage
//document.getElementById('usernameContainer').textContent = localStorage.getItem('username');

// Upewniamy się, że DOM został załadowany
document.addEventListener('DOMContentLoaded', function() {
  loadCarBrands();
  console.log("Załadowano dashboard.js");
});
console.log("Załadowano dashboard.js");
// Funkcja pobierająca marki samochodów
function loadCarBrands() {
  
  fetch('/getCarBrands', {
    credentials: 'include' // <-- kluczowe dla wysyłania ciastek!
  })
    .then(response => response.json())
    .then(data => {
      console.log("Odpowiedź serwera:", data);
      data.forEach(brand => {
        const option = document.createElement("option");
        option.textContent = brand.name;
        option.value = brand.id;
        brandsList.appendChild(option);
      });
    })
    .catch(error => console.error('Błąd podczas pobierania danych:', error));
}

// Funkcja asynchroniczna pobierająca modele samochodów dla danej marki
async function loadCarModels(brandId) {
  const url = "/getCarModels/" + brandId;
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }
    const models = await response.json();
    console.log(models);

    // Czyścimy listę modeli przed dodaniem nowych opcji
    modelsList.innerHTML = '<option value="">-- Choose Model --</option>';

    models.forEach(model => {
      const option = document.createElement("option");
      option.textContent = model.name;
      option.value = model.id;
      modelsList.appendChild(option);
    });
  } catch (error) {
    console.error(error.message);
  }
}

// Funkcja asynchroniczna pobierająca generacje dla wybranego modelu
async function loadCarGenerations(modelId) {
  const url = "/getModelGeneration/" + modelId;
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Response status : ${response.status}`);
    }
    // Oczekujemy na rozpakowanie odpowiedzi JSON
    const generations = await response.json();
    console.log(generations);

    // Czyścimy listę generacji przed dodaniem nowych opcji
    generationsList.innerHTML = '<option value="">-- Choose Generation --</option>';

    generations.forEach(generation => {
      const option = document.createElement("option");
      option.textContent = generation.name;
      option.value = generation.id;
      generationsList.appendChild(option);
    });
  } catch (error) {
    console.log(error);
  }
}

// Obsługa zmiany wybranej marki
brandsList.addEventListener('change', function() {
  const brandId = this.value;
  if (brandId) {
    loadCarModels(brandId);
  }
});

// Obsługa zmiany wybranego modelu
modelsList.addEventListener('change', function() {
  const modelId = this.value;
  if (modelId) {
    loadCarGenerations(modelId);
  }
});
