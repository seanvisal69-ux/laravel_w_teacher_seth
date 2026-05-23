<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>

    <style>
        section {
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            column-gap: 20px;
        }

        .container img {
            width: 420px;
        }

        .text {
            display: block;
            padding: 40px 40px;
            width: 450px;
        }

        .text {
            display: block;
            padding: 40px 40px;
            width: 450px;
        }

        .text h1 {
            color: #000000;
            font-size: 35px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .text p {
            font-size: 15px;
            color: #000000;
            margin-bottom: 15px;
            line-height: 1.5rem;
            margin-bottom: 15px;
        }

        .input-box {
            position: relative;
            display: flex;
            width: 100%;
        }

        .input-box input {
            width: 85%;
            height: 40px;
            padding: 5px 15px;
            font-size: 16px;
            color: #22232e;
            border-radius: 5px 0px 0px 5px;
            border: 2px solid #42455a;
            outline: none;
        }

        .input-box button {
            display: flex;
            width: 15%;
            border: 1px solid #004958;
            border-radius: 0px 5px 5px 0px;
            background: #004958;
            color: #e0ffff;
            font-size: 22px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .menu {
            display: flex;
            flex-direction: column;
            margin-top: 15px;
            margin-left: 30px;
        }

        .menu li a {
            display: flex;
            font-size: 1rem;
            color: #000000;
            transition: 0.1s;
        }
    </style>
</head>

<body>



    <div class="box1">
        <section>
            <div class="container">
                <div class="text">
                    <h1>Page Not Found</h1>
                    <p>We can't seem to find the page you're looking for. Please check the URL for any typos.</p>
                    <div class="input-box">
                        <input type="text" placeholder="Search...">
                        <button><i class="fa-solid fa-search"></i></button>
                    </div>
                    <ul class="menu">
                        <li><a href="#">Go to Homepage</a></li>
                        <li><a href="#">Visit our Blog</a></li>
                        <li><a href="#">Contact support</a></li>
                    </ul>
                </div>
                <div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>