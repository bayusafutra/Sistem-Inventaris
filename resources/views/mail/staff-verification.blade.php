<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email TeknoLogis</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        p {
            color: black
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #0e1726;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .content h2 {
            color: #0e1726;
            font-size: 20px;
        }
        .content p {
            font-size: 14px;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #0e1726;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 20px 0;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #1a263a;
        }
        .button .text {
            color: white;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>TechnoLogis</h1>
        </div>
        <div class="content">
            <h2>Selamat, {{ ucwords($user->name) }},</h2>
            <p>Akun Technologis Anda telah berhasil ditambahkan oleh manajer toko <strong>{{ ucwords($user->toko->name) }}</strong>. Silakan klik tombol di bawah ini untuk mengaktifkan akun Anda.</p>
            <a href="{{ url('verify-staff/' . $user->verification_token) }}" class="button">
                <span class="text">Verifikasi Akun Saya</span>
            </a>
            <p>Setelah akun berhasil diaktifkan, silahkan masuk menggunakan <span style="font-style: italic">email</span> ini dengan <span style="font-style: italic">password</span> : <span style="font-family:courier;">technologis</span></p>
            <p>Selamat bergabung bersama kami di Sistem Inventaris Technologis</p>
        </div>
        <div class="footer">
            <p>© 2025 TechnoLogis Team. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>
