const loginForm = document.getElementById('login-form');
const messageDiv = document.getElementById('message');

loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    messageDiv.textContent = '';

    try{
        const formData = new FormData(loginForm);
        const response = await fetch('/login/auth', {
            method: 'POST',
            body: formData
        })
        if (!response.ok) {
            throw new Error(`HTTP error: ${response.status}`);
        }
        const responseText = await response.text();
        console.log("Raw response:", responseText);
        let data;
        try {
            data = JSON.parse(responseText);
        } catch (parseError) {
            throw new Error("Response is not valid JSON: " + responseText);
        }
        data = JSON.parse(responseText);

        console.log("Parsed data:", data);
        if(data.token){
            localStorage.setItem('auth_token', data.token);
        }
        if(data.username){
            localStorage.setItem('username', data.username);
        }
        window.location.href = '/dashboard';
    }catch (error) {
        console.error("Fetch error:", error);
        messageDiv.style.color = 'red';
        messageDiv.textContent = `Error: ${error.message}`;
    }
})