<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
    <title>Document</title>

    <style>
        body{
            font-family:'calibri';
        }
        .erneste{
            width:500px;
        text-align: center;
        padding-top:40px;
        margin-left:500px;
        position: relative;;
        margin-top:100px;
        list-style: none;
            height:450px;
            box-shadow:2px 2px 3px 3px rgb(23,32,42);
            border-radius:10px;
        }
.tit{
    background:linear-gradient(45deg,rgba(6, 33, 97, 1),rgba(141, 197, 22, 1));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size:20px;
}
.btn{
    margin-top:40px;
    width:140px;
    height:40px;
    border:none;
    border-radius:10px;
    background:#112;
    color:white;
    text-align: center;
}
i{
    color:#112;
    font-size:17px !important;
}
li{
    padding-top:10px;
}
.erneste::before{
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    opacity:50%;
    background:#112;
    top:0;
    left:0;
}
.around{
    position:relative;
        border:5px solid white;

    

}
.around::before{
        content:"";
    position:absolute;
    width:100%;
    height:100%;
    opacity:50%;
    background:#112;
    top:0;
    left:0;
    border:5px solid #112;


}
    </style>
</head>
<body>
    <div class="erneste">
        <div class="holder">
            <img class="around" style="width:150px; height:150px; border-radius:50%" src="https://rw.usembassy.gov/wp-content/uploads/sites/199/2025/03/ASYV.jpg">
            <h2 class="tit">Itangishaka Erneste, I'm software developer</h2>

            <li> <i style="margin-right:10px; font-size:25px;" class="fa-brands fa-audible"></i>NOthing yet published here,wait!</li>
            <li style="color:#112; font-size:20px;">Contact me</li>
            <li><i style="margin-right:10px; font-size:25px;" class="fa-regular fa-envelope-open"></i>Email: Honorgenius001@gmail.com</li>
            <li><i style="margin-right:10px; font-size:25px;"   class="fa-solid fa-phone-volume"></i>Telphone:078432242</li>
            <button class="btn">Get started</button>
        </div>

    </div>
</body>
</html>