<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .footer {
            display: flex;
            flex-direction: row;
            padding: 1.2em;
            overflow: auto;
            background-color: #ddd;
            font-size: .8rem;
            text-align: center;
            color: #333;
            font-weight: bold;
            border-bottom: .5rem solid #808080;
        }
        
        .footer a, .footer p {
            text-decoration: none;
            font-family: 'Quicksand', sans-serif;
            color: #333;
        }
        
        .footer a:hover {
            transition: all .7s ease;
            border-bottom: 3px solid #333;
        }
        
        .copy {
            flex: 1;
            order: 1;
        }
        
        .top {
            flex: 1;
            order: 2;
        }
        /* Responsive Breakpoint */
        @media screen and (max-width: 960px) {
            .top {
                display: none;
            }

        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!-- Footer Section -->
	<footer class="footer fixed-bottom">
		<p class="copy">&copy; 1443 | 2021. Carty.</p>
		<p class="top">
			<a href="#">Kembali ke Atas</a>
		</p>
	</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>