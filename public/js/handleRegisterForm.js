const registerForm = document.getElementById('registerForm');
const messageDiv = document.getElementById('message');

registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Czyścimy poprzednie komunikaty
    messageDiv.textContent = '';
    
    try {
      const formData = new FormData(registerForm);
      const response = await fetch('back/register.php', {
        method: 'POST',
        body: formData
      });
      
      if (!response.ok) {
        throw new Error(`Błąd HTTP: ${response.status}`);
      }
      
      // Pobieramy surową odpowiedź
      const responseText = await response.text();
      console.log("Surowa odpowiedź:", responseText);
      
      let data;
      try {
        data = JSON.parse(responseText);
      } catch (parseError) {
        throw new Error("Odpowiedź nie jest poprawnym JSON-em: " + responseText);
      }
      
      console.log("Parsowane dane:", data);
      messageDiv.style.color = data.status === 'success' ? 'green' : 'red';
      messageDiv.textContent = data.message;
  
    } catch (error) {
      console.error("Fetch error:", error);
      messageDiv.style.color = 'red';
      messageDiv.textContent = `Wystąpił błąd: ${error.message}`;
    }
});
