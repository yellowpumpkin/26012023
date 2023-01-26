<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Siam Kyohwa Seisakusho</title>

    <!-- css -->
    <link rel="stylesheet" href="style.css" />
    <!-- css cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--cdn icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Thai&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Nav Bar -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.php" class="logo__sk">
                <img src="images/dog.png" alt="" />
            </a>
            <!-- <a class="animate-charcter">SIAM KYOHWA <span> SEISAKUSHO</span></a> -->
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="index.php" class="navbar__links" id="home-page">Home</a>
                </li>

                <li class="navbar__btn">
                    <button id="show-login" class="main__btn">
                        <a href="signin.php">Login</a>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- container -->
    <div class="hero" id="home">
        <div class="hero__container">
            <h1 class="hero__h1">ระบบแจ้งซ่อมบำรุง </h1>
            <h1 class="hero__heading">SIAM KYOHWA </h1>
            <a class="animate-charcter">SEISAKUSHO</a>

            <!-- <button class="main__btn"><a href="#">Explore</a></button> -->
        </div>
    </div>

    <!-- footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #fff">© since 2015
            &nbsp;
            <a href="https://www.facebook.com/skpallet2539"><i class="bi bi-facebook"></i></a> &nbsp; &nbsp;
            <a href="https://www.siamkyohwa.co.th/"><i class="bi bi-browser-chrome"></i></a>
        </div>
    </footer>

    <!-- js -->
    <script src="script.js"></script>
    <!-- js cdn bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>