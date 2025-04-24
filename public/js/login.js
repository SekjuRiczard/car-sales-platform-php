const loginForm = document.getElementById('login-form');
const messageDiv = document.getElementById('message');

loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    messageDiv.textContent = '';

    try{
        const formData = new FormData(loginForm);
        const url = "/login/auth";
        const response = await fetch(url , {
            method: 'POST',
            body: formData
        });

        if(!response.ok){
            throw new Error(`Response status: ${response.status}`);
        }

        const data = await response.json();
        console.log(data);
        
        if(data.token && data.username){
            localStorage.setItem('auth_token',data.token);
            localStorage.setItem('username',data.username);
            window.location.href = '/dashboard';
        }else{
               // tutaj obsługujesz sytuację, gdy token NIE został zwrócony
               messageDiv.style.color = 'red';

               if (data.message) {
                   messageDiv.textContent = `Błąd: ${data.message}`;
               } else {
                   messageDiv.textContent = 'Logowanie nie powiodło się. Spróbuj ponownie.';
               }
   
               console.warn("Token nie został zwrócony! Debug info:", data);
           }
        }catch(error){
            console.error("Blad fetch lub JSON",error);
            messageDiv.style.color="red";
            messageDiv.textContent = `Blad aplikacji ${error.message}`;
        }
    
});