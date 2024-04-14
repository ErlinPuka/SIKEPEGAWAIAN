<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link rel="Shortcut icon" href = "{{ asset('images/Logobaru.jpg') }}"alt="">
        <link rel="stylesheet" href="{{  asset('css/login.css') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - CVIndahCemerlang</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2><i class="fas fa-lock"></i> Login CV Indah Cemerlang</h2>
            <form>
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <input type="text" id="username" placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i> Password</label>
                    <input type="password" id="password" placeholder="Masukkan password">
                </div>

                <div class="form-group remember-me-group">
                    <label for="remember-me">
                        <input type="checkbox" id="remember-me"> RememberMe
                    </label>
                </div>
                
                <button a href="dashboard" type="submit" class="btn" ><i class="fas fa-sign-in-alt"></i> Login</button>
                {{-- <button type="submit" class="btn" onclick="redirectToDashboard()"><i class="fas fa-sign-in-alt"></i> Login</button> --}}

            </form>
            <div class="register-link">
                <p>Belum punya akun? <a href="register">Registrasi</a></p>
            </div>
        </div>
    </div>
</body>
</html>