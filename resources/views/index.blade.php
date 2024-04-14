<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="Shortcut icon" href = "{{ asset('images/logo.png') }}"alt="">
        <title>PT Chosik</title>
        <link rel="stylesheet" href="{{  asset('css/style.css') }}" />
	    <link rel="preconnect" href="https://fonts.googleapis.com" />	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
        <div class="container">
            <header>
                <nav>
                    <div class = "logoterbaru">
                        <img src="{{asset('images/Logoterbaru.png')}}" alt="Image" height="50" width="162" />
                    </div>
                    <input type="checkbox" id="click" />
                    <label for="click" class="menu-btn">
                        <i class = "fas fa-bars"></i>
                    </label>
                    <ul>
                        <li><a href = "#">Home</a></li>
                        <li><a href = "#">About</a></li>
                        <li><a href = "#">Categories</a></li>
                        <li><a href = "login">Login</a></li>
                    </ul>
                </nav>
            </header>
            <main>
                <div class="posterawal">
                    <div class="posterawal-text">
                        <h1> Spice Up Your Day With Chocolate Everyday</h1>
                        <p>Chocolate Sikka akan memberikan sensasi 
                            terbaru untuk Harimu</p>
                            <button type="button" class="btn_getStarted">Get Started</button>
                        </div>
                        <div class="posterawal-img">
                            <img src="{{asset('images/terbaru.png')}}" alt="Image" height="409" width="550" />
                        </div>
                    </div>
                <div class = "cards-categories">
                    <h2>Chocolate Categories</h2>
                    <div class="card-categories">
                        <div class="card">
                            <img src="{{asset('images/coklat_pasta.jpg')}}" alt="Image" height="200" width="200" />  
                            <h5>Chocolate Pasta</h5>
                            <p>Chocolate Pasta adalah produk berbentuk pasta yang terbuat dari coklat kental yang mempunyai aroma yang sangat wangi
                            </p>
                        </div>
                        <div class="card">
                            <img src="{{asset('images/darkcoklat.jpg')}}" alt="Image" height="200" width="200" />
                            <h5>Dark Chocolate</h5>
                            <p>Dark Chocolate adalah coklat yang terbuat dari biji kakao dan diolah tanpa menambahkan susu. itulah mengapa Dark Chocolate mempunyai aroma yang lebih kuat </p>
                        </div>
                        <div class = "card">
                            <img src="{{asset('images/milkcoklat.jpg')}}" alt="Image" height="200" width="200"/>
                            <h5>Milk Chocolate</h5>
                            <p>Milk Chocolate adalah coklat yang mengandung kakao dan susu kental manis atau bubuk susu. Milk Chocolate ini mempunyai tekstur yang sangat lembut</p>
                        </div>
                        <div class = "card">
                            <img src="{{asset('images/candycoklat.jpg')}}" alt="Image" height="200" width="200" />
                            <h5>Candy Coating Chocolate</h5>
                            <p>Candy Coating Chocolate adalah Produk Permen yang diberi perasa Coklat dan minyak sayur sebagai pengganti mentega kakao</p>
                        </div>
                        <div class = "card">
                            <img src="{{asset('images/whitecoklat.jpg')}}" alt="Image" height="200" width="200"/>
                            <h5>White Chocolate </h5>
                            <p>White Chocolate adalah mengandung mentega kakao setidaknya 20% dan 14% susu dan juga vanila yang memberikan kesan wangi</p>
                        </div>
                </div>
            </div>
        </main>
            <footer>
                <h4> &copy;PT Chocolate Sikka </h4>
            </footer>
        </div>
    </body>
</html>
