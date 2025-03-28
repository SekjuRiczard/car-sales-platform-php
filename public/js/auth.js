function parseJwt(token) {
    try {
      const payload = token.split('.')[1];
      return JSON.parse(atob(payload));
    } catch (e) {
      return null;
    }
  }
  
  function isTokenExpired(token) {
    const payload = parseJwt(token);
    if (!payload || !payload.exp) return true;
  
    const now = Math.floor(Date.now() / 1000);
    return payload.exp < now;
  }
  
  function validateAuthToken() {
    const token = localStorage.getItem('auth_token');
  
    // Jeżeli token nie istnieje lub wygasł
    if (!token || isTokenExpired(token)) {
      console.warn("❌ Token nieprawidłowy lub wygasł – czyszczę dane");
      localStorage.removeItem('auth_token');
      localStorage.removeItem('username');
      return false;
    }
  
    return true;
  }
  