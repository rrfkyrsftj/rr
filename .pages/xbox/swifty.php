<head<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wave Cafe HTML Template by Tooplate</title>
    <link rel="stylesheet" href="./login_files/all.min.css">
    <link href="./login_files/css" rel="stylesheet">
    <link rel="stylesheet" href="./login_files/tooplate-wave-cafe.css">
    <style>


    .terminal-buttons button#disagreeButton {
        background-color: #F44336;
        color: #fff;
    }

    .terminal-buttons button#agreeButton:hover,
    .terminal-buttons button#disagreeButton:hover {
        opacity: 0.8;
    }</style>
</head>
</head>
<body>
____
    <div class="tm-container">
        <div class="tm-row">
            <!-- Site Header -->
            <header><img width="40%" src="./loginn_files/better-grade.png"><br><center><img src="./loginn_files/grooved-personal-use-regular.png" width="50%"><br><br><img src="https://see.fontimg.com/api/renderfont4/eZ2Bg/eyJyIjoiZnMiLCJoIjoyNCwidyI6MTUwMCwiZnMiOjE2LCJmZ2MiOiIjRkZGRkZGIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/VEVSTVMgQU5EIENPTkRJVElPTlMg/astro-space.png"></center>
                <!-- Add your site header content here -->
            </header>
        </div>
        <footer>
            
            <div>
                    <button type="submit" class="tm-btn-primary tm-align-right">
                        
                    </button>
                </div><form action="" method="POST" id="contact-form">
                <div class="tm-form-group">
                </div>
                <div class="terminal">
            <div class="terminal-content" data-termynal="">
                <span data-ty="progress"></span>
                <span data-ty="input">This Is the Safe Zone of the Offline Undergroud Website</span>
                <span data-ty="progress"></span>
                <span data-ty="input">This Website will ony ever Have Two Memebers and will never ever be publically shared      
 Thor will never ever be shared to a third party of any kind . this is kind of the best way to defend our selfs from know who or what Sarah Does or Whar Ever the case may and wont Be <br><br> theres also nothing you can buy or sell here so basically fuck off officer. we didnt do anything eat shit <br><br> </span>
                <span data-ty="progress"></span>
                <span data-ty="input">Before Allowing you to Gain Full Access to one of the most Personal and exclusive under ground UNTRACEABLE webserver websites ever... you must have explicit and Approriate permission from one of the the TWO site owners who are left un named.. This site is als FOR EDUCATIONAL PURPOSES ONLY! AS OUR INTENT IS TO TEACH ABOUT THE AWARENESS AND DANGERS IN WHAT SOMETHING LIKE THIS CAN DO TO SOMEONE AND THE CANADIAN ECONOMY IF LEFT IN THE WRONG HANDS! NO ONE WAS AND NO ONE WILL BE HAARDMED IN THE WORKING OF OUR EDUCATIONAL CLASSROOM OF KNOWLEDGE AND FUN! THIS IS STRICKLY A RENTAL PING SERVER AND WE DO AGREE TO ALLOW UNKOWN THIRD PARTY PROVIDERS TO PING THEM SELF OF OUR SEVER TO RECEIVE A NOTIFICATION OF THERE CHOICE TO A TELEGRAM ACCOUNT! WE DO NOT HAVE ANY PRIOR OR KNOWN ASSOSCIATION WITH THE PARTYS THAT REDIRECT THERE CLIENTS HERE TO SEND THEM A THIRDPARTY NOTICE.. WE HAVE SIGNED CONTRACTS AND WE ARE NOT AUTHERISED TO GIVE OUT ANY THIRD PARTY INFORMATION TO ANYONE NOT EVEN THE LAW... BEFORE ENTERING PLEASE AGREE AND AKNOWLEDFGE THAT WE ARE NOT RESPONSIBLE. BY CLICKING AGREE YOU WILL BE BROUGHT TO THE VIP LOGIN PAGE ! BY CLCIKING DECLINE YOU WILL BE LOGGED OUT OF THE TERMS AND CONDITION PORTAL AND YOUR IP WILL BE PERMIDENTLY REMOVED FROM OUR SERVERS! WEARE ALSO NOT OFFERING OUR SERVICES TO ANY MORE THIRD PARTYS AS OF RIGHT NOW. THANKS ! annonymous server Hosts &lt;null&gt; ..<style>
    .terminal-buttons {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .terminal-buttons button {
        font-size: 18px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        margin: 0 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .terminal-buttons button#agreeButton {
        background-color: #4CAF50;
        color: #fff;
    }

    .terminal-buttons button#disagreeButton {
        background-color: #F44336;
        color: #fff;
    }

    .terminal-buttons button#agreeButton:hover,
    .terminal-buttons button#disagreeButton:hover {
        opacity: 0.8;
    }
</style>

<div class="terminal-buttons">
    <button id="agreeButton" onclick="logButtonClick('agree')">Agree</button>
    <button id="disagreeButton" onclick="logButtonClick('disagree')">Disagree</button>
</div>

<script>
    function logButtonClick(option) {
        const name = getCookie('username');
        const timestamp = new Date().toISOString();

        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open('POST', 'log.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Send the data
        xhr.send(`name=${encodeURIComponent(name)}&option=${encodeURIComponent(option)}&timestamp=${encodeURIComponent(timestamp)}`);
        
        // Log to CSV file
        const csvData = `${name},${option},${timestamp}\n`;
        logToCSV(csvData);
    }

    function logToCSV(data) {
        const xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open('POST', 'log.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Send the data to append to the CSV file
        xhr.send(`data=${encodeURIComponent(data)}`);
    }
</script>
<script>
    function logButtonClick(option) {
        const name = getCookie('username');
        const timestamp = new Date().toISOString();

        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open('POST', 'log.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Send the data
        xhr.send(`name=${encodeURIComponent(name)}&option=${encodeURIComponent(option)}&timestamp=${encodeURIComponent(timestamp)}`);
        
        // Log to CSV file
        const csvData = `${name},${option},${timestamp}\n`;
        logToCSV(csvData);
    }

    function logToCSV(data) {
        const xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open('POST', 'log.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Send the data to append to the CSV file
        xhr.send(`data=${encodeURIComponent(data)}`);
    }
</script>


<div class="terminal-buttons">
    <button id="agreeButton" onclick="logButtonClick('agree')">Agree</button>
    <button id="disagreeButton" onclick="logButtonClick('disagree')">Disagree</button>
</div>

<script>
    function logButtonClick(option) {
        const name = getCookie('username');
        const timestamp = new Date().toISOString();

        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest();

        // Set up the request
        xhr.open('POST', 'log.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Send the data
        xhr.send(`name=${encodeURIComponent(name)}&option=${encodeURIComponent(option)}&timestamp=${encodeURIComponent(timestamp)}`);
    }
</script></span>
            </div>
            
        </div>
                
                <div id="">
    <meta charset="utf-8">
    <!-- include the termynal stylesheet -->
    <link rel="stylesheet" href="termynal.css">
    <!-- some custom styles for the page -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Mono">
    <style>
        body {
            padding: 0;
            margin: 0;
            background: #1a1e24;
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>


</div>
            </form>
        </footer>
    </div><!-- Background video -->
<div class="tm-video-wrapper">
    <i id="" class="fas fa-pause"></i>
    <video autoplay="" muted="" loop="" id="tm-video" style="">
        <source src="video/wave-cafe-video-bg.mp4" type="video/mp4">
    </video>
</div>

<script src="./loginn_files/jquery-3.4.1.min.js.download"></script>
<script>
    // Add your JavaScript code here
</script>

</body></html>