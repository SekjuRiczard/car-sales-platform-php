<?php
session_start();
$user = $_SESSION['user'] ?? [];
$username = htmlspecialchars($user['username'] ?? 'Użytkownik', ENT_QUOTES);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
  <style>
    /* Reset */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Poppins', sans-serif; background: #f0f2f5; color: #333; }
    a { text-decoration: none; color: inherit; }
    /* Layout */
    .container { display: flex; height: 100vh; }
    .sidebar { width: 240px; background: #fff; border-right: 1px solid #e0e0e0; display: flex; flex-direction: column; align-items: center; padding: 20px; }
    .sidebar .avatar { width: 80px; height: 80px; border-radius: 50%; background: #ddd; margin-bottom: 20px; }
    .sidebar h2 { margin-bottom: 30px; font-size: 1.2rem; }
    .sidebar .action-btn { width: 50px; height: 50px; border: 2px solid #3498db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; cursor: pointer; transition: background 0.2s; }
    .sidebar .action-btn:hover { background: #3498db; color: #fff; }
    .sidebar .action-btn.logout { border-color: #e74c3c; }
    /* Content */
    .content { flex: 1; padding: 30px; overflow-y: auto; }
    .content h1 { margin-bottom: 20px; font-size: 1.5rem; }
    .ads-list { display: grid; gap: 16px; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); }
    .ad-card { background: #fff; padding: 16px; border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between; }
    .ad-card h3 { font-size: 1.1rem; margin-bottom: 8px; }
    .ad-card p { flex: 1; font-size: 0.9rem; color: #666; }
    .ad-card .ad-actions { margin-top: 12px; text-align: right; }
    .ad-card .ad-actions button { background: none; border: none; color: #3498db; cursor: pointer; font-size: 0.9rem; }
  </style>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="avatar"></div>
      <h2><?= $username ?></h2>
      <div class="action-btn add" title="Dodaj ogłoszenie">
        <span class="material-symbols-outlined">add</span>
      </div>
      <form action="/logout" method="POST">
        <button type="submit" class="action-btn logout" title="Wyloguj">
          <span class="material-symbols-outlined">logout</span>
        </button>
      </form>
    </aside>
    <main class="content">
      <h1>Twoje ogłoszenia</h1>
      <div class="ads-list">
        <!-- Przykładowe ogłoszenie -->
        <div class="ad-card">
          <h3>Sprzedam samochód</h3>
          <p>Świetny stan, 100 000 km, rok 2018.</p>
          <div class="ad-actions">
            <button>Edytuj</button>
          </div>
        </div>
        <div class="ad-card">
          <h3>Wynajmę mieszkanie</h3>
          <p>Dwupokojowe, centrum, dostępne od zaraz.</p>
          <div class="ad-actions">
            <button>Edytuj</button>
          </div>
        </div>
        <!-- Możesz iterować po swoich ogłoszeniach tutaj -->
      </div>
    </main>
  </div>
</body>
</html>
