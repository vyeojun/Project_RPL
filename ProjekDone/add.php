<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Data Anak Didik - Manajemen TK</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background-color: #f0f4f8;
      margin: 0;
      padding: 0;
      color: #2f3542;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: #6c5ce7;
      color: white;
      flex-wrap: wrap;
    }

    .left-nav {
      font-weight: bold;
      font-size: 24px;
    }

    .center-nav {
      display: flex;
      justify-content: center;
      gap: 30px;
    }

    .center-nav a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .center-nav a:hover {
      color: #a29bfe;
    }

    .right-nav {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .search-bar {
      background-color: #fff;
      border: none;
      border-radius: 25px;
      padding: 8px 15px;
      width: 200px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .search-bar:focus {
      outline: none;
      border: 2px solid #6c5ce7;
    }

    .container {
      padding: 20px 60px;
      max-width: 800px;
      margin: 0 auto;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 20px;
      font-size: 28px;
      font-weight: bold;
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      font-weight: bold;
      display: block;
    }

    .form-group input, .form-group select {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ddd;
      font-size: 16px;
    }

    .form-group input:focus, .form-group select:focus {
      outline: none;
      border: 1px solid #6c5ce7;
    }

    .form-actions {
      text-align: center;
    }

    .form-actions button {
      background-color: #6c5ce7;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .form-actions button:hover {
      background-color: #a29bfe;
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="left-nav">Manajement TK</div>
    <nav class="center-nav">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>
    <div class="right-nav">
      <label>Search</label>
      <input class="search-bar" type="text" placeholder="Cari..." />
      <a href="#">Login</a>
    </div>
  </header>

  <div class="container">
    <h2>Tambah Data Anak Didik</h2>

    <form action="" method="POST">
      <div class="form-group">
        <label for="nis">NIS</label>
        <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required />
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required />
      </div>
      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="agama">Agama</label>
        <input type="text" id="agama" name="agama" placeholder="Masukkan Agama" required />
      </div>
      <div class="form-group">
        <label for="orang_tua">Nama Orang Tua</label>
        <input type="text" id="orang_tua" name="orang_tua" placeholder="Masukkan Nama Orang Tua" required />
      </div>

      <div class="form-actions">
        <button type="submit">Tambah Data</button>
      </div>
    </form>
  </div>

</body>
</html>
