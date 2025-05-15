// js/dashboard.js
import { fetchBrands ,fetchGenerations, fetchModels } from "./api/api.js";

document.addEventListener('DOMContentLoaded', async () => {
  const brandSelect      = document.getElementById('brand');
  const modelSelect      = document.getElementById('model');
  const generationSelect = document.getElementById('generation');

  // 1. Wypełnij brands
  try {
    const brands = await fetchBrands();
    brands.forEach(b => {
      const opt = document.createElement('option');
      opt.value = b.id;
      opt.textContent = b.name;
      brandSelect.append(opt);
    });
  } catch (e) {
    console.error(e);
  }

  // 2. Kiedy zmieni się brand → pobierz modele
  brandSelect.addEventListener('change', async () => {
    modelSelect.innerHTML = '<option value="">— wybierz model —</option>';
    generationSelect.innerHTML = '<option value="">— wybierz generację —</option>';
    if (!brandSelect.value) return;
    try {
      const models = await fetchModels(brandSelect.value);
      models.forEach(m => {
        const opt = document.createElement('option');
        opt.value = m.id;
        opt.textContent = m.name;
        modelSelect.append(opt);
      });
    } catch (e) {
      console.error(e);
    }
  });

  // 3. Kiedy zmieni się model → pobierz generacje
  modelSelect.addEventListener('change', async () => {
    generationSelect.innerHTML = '<option value="">— wybierz generację —</option>';
    if (!modelSelect.value) return;
    try {
      const gens = await fetchGenerations(modelSelect.value);
      gens.forEach(g => {
        const opt = document.createElement('option');
        opt.value = g.id;
        opt.textContent = g.name;
        generationSelect.append(opt);
      });
    } catch (e) {
      console.error(e);
    }
  });
});
