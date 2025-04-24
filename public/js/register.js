const registerForm = document.getElementById('registerForm');
const messageDiv = document.getElementById('message');

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    messageDiv.textContent = '';
    
    try {
      const formData = new FormData(registerForm);
      const url='/register/saveUser';

      const response = await fetch(url, {
        method: 'POST',
        body: formData
      });
      
      if (!response.ok) {
        throw new Error(`Błąd HTTP: ${response.status}`);
      }
      
     
      const data = await response.json();
      console.log("Register odpowiedź:", response.json , response.status);
      
      if (data.token && data.username) {
        localStorage.setItem('auth_token', data.token);
        localStorage.setItem('username', data.username);
        window.location.href = '/dashboard';
      }else{
        messageDiv.style.color = "red";
        if (data.message) {
          messageDiv.textContent = `Błąd: ${data.message}`;
       } else {
          messageDiv.textContent = 'Rejestracja nie powiodła się. Spróbuj ponownie.';
      }
      }
    } catch (error) {
      console.error("Fetch error:", error);
      messageDiv.style.color = 'red';
      messageDiv.textContent = `Wystąpił błąd: ${error.message}`;
    }
});
