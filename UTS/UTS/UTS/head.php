<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS WEB</title>
    <style>
        * {box-sizing: border-box;}
        body {font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}
        header {
            background-color: powderblue;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: black;
        }
        nav {
            float: left;
            width: 20%;
            height: 300px;
            background: #FDFAF6;
            padding: 20px;
            padding:40px
        }
        nav ul {list-style-type: none; padding: 0;}
        article {
            float: left;
            padding: 20px;
            width: 80%;
            background-color:white;
            color: gray;
            height: 300px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        }

        section::after {
            content: "";
            display: table;
            clear: both;
        }
        footer {
            background-color:lightblue;
            padding: 10px;
            text-align: center;
            color:gray;
            margin-top:20px;
        }
        @media (max-width: 600px){
        nav,article {
            width: 100%;
            height: auto;
        }
        }
    
    </style>
</head>


