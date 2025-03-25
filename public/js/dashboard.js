
 const moreFiltersBtn = document.getElementById('moreFiltersBtn');
 const extraFilters = document.getElementById('extraFilters');

 moreFiltersBtn.addEventListener('click', function() {
   if (extraFilters.style.display === 'none' || extraFilters.style.display === '') {
     extraFilters.style.display = 'flex'; // lub 'block', zależnie od układu
     moreFiltersBtn.textContent = "Less Filters"; // opcjonalnie zmiana tekstu przycisku
   } else {
     extraFilters.style.display = 'none';
     moreFiltersBtn.textContent = ""; // reset tekstu, jednak lepiej zmienić zawartość w przycisku
     // Aby zachować ikonę, można użyć np. innerHTML:
     moreFiltersBtn.innerHTML = '<span class="material-symbols-outlined">filter_list</span> More Filters';
   }
 });