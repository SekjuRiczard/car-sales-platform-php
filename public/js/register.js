const registerForm = document.getElementById('registerForm');
const messageDiv = document.getElementById('message');

registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    messageDiv.textContent = '';
    
    try {
      const formData = new FormData(registerForm);
      const response = await fetch('/register/saveUser', {
        method: 'POST',
        body: formData
      });
      
      if (!response.ok) {
        throw new Error(`Błąd HTTP: ${response.status}`);
      }
      
     
      const responseText = await response.text();
      console.log("Surowa odpowiedź:", responseText);
      
      let data;
      try {
        data = JSON.parse(responseText);
      } catch (parseError) {
        throw new Error("Odpowiedź nie jest poprawnym JSON-em: " + responseText);
      }
      data = JSON.parse(responseText);

      
      if (data.token) {
        localStorage.setItem('auth_token', data.token);
      }
      if (data.username) {
        localStorage.setItem('username', data.username);
      }
      
      console.log("Parsowane dane:", data);
     
      window.location.href = '/dashboard';
    } catch (error) {
      console.error("Fetch error:", error);
      messageDiv.style.color = 'red';
      messageDiv.textContent = `Wystąpił błąd: ${error.message}`;
    }
});
