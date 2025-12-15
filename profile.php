<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
  font-family: 'Calibri', sans-serif;
  background:#112;
        }
        .parent{
            border-radius:20px;
            list-style: none !important;
            color:white !important;
            background:black;
            margin-left:450px;
            width:620px;
            height:580px;
            box-shadow:3px 0px 2px 2px blue;
        }
        .container{

            display:flex;
            justify-content: space-between;
            align-items: center;
        }
        .flexible{
            margin-top:40px;
            display:flex;
            align-items: center;
            gap:10px;
            
        }
        .flexible>div{
            width:180px;
            text-align: center;

            padding-top:20px;
            height:70px;
            background:#112;
            color:rgba(31, 189, 7, 1);
            border-radius:10px;
            
        }
        .make{
            margin-top:20px;
        }
        .bt1{
            margin-right:40px;
            width:140px;
            height:40px;
            
            background:white;
            border:2px solid yellow;
            border-radius:10px;
            

        }
        .bt{
            margin-right:70px;
            padding-top:40px;
            border:none;
            outline:none;
            background:transparent;
          
            border-radius:10px;
            color:white;
            font-size:16px;


        }
        .bt:hover{
            color:rgba(31, 189, 7, 1);
            transition:color 3s;
        }
        .bt1{
            background:rgba(31, 189, 7, 1);
            transition: background 4s;
        }
        .mar{
            margin-left:30px;
            margin-top:70px;
            margin-bottom:20px;
            margin-right:10px;
        }
    </style>
</head>
<body>
            <div class="parent">
                <div class="mar">

    <div class="container">
    <div style="display:flex; gap:10px;">
        <div>
        <img style="width:100px; height:100px; border:6px solid yellow; border-radius:50%;" src="https://images.squarespace-cdn.com/content/v1/5a820ae0e45a7c13e22de06c/1720625504822-PPGNDL8WD00ETD43AKN8/3W4A9253.jpg">
    </div>
    <div style="padding-top:40px;">
        <li style="font-size:18px;">Erneste Programmer</li>
        <li style="padding-top:6px; font-size:20px;">Teacher</li>
    </div>
    </div>
    <div style="display:block; margin-top:50px;">
        <button class="bt1"><i style="margin-right:10px;" class="fa-solid fa-pencil"></i>Edit</button><br>
        <button class="bt">Change profile</button>

    </div>
</div>
<div>
    <li style="padding-top:10px; font-size:20px;"><img style="width:30px; height:30px; margin-right:10px; " src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRLxE3RBGrlnnrgtWQDgwR0aF_24g5LUE0VSePIFGdVhp1GTM5LVkgZy7eRx_--ppe0-GIvymbC"> Contact information</li>
    <li style="padding-top:20px; "><img style="width:25px;  height:25px; margin-right:10px;  color:blue;" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRLxE3RBGrlnnrgtWQDgwR0aF_24g5LUE0VSePIFGdVhp1GTM5LVkgZy7eRx_--ppe0-GIvymbC">Erneste programmer</li>
    <li style="padding-top:20px; "><i style="margin-right:10px; padding-top:10px; width:35px; text-align:center; height:20px; background:yellow; color:black;" class="fa-regular fa-envelope"></i>ernestepro@gmail.com</li>
    <li style="padding-top:20px;"><i style="margin-right:10px; color:black; padding-top:10px; width:35px; height:20px; background:yellow; text-align:center; " class="fa-solid fa-phone"></i>0784438734</li>
</div>
<hr style="background:blue; width:0%; display:flex; justify-content:center;"
<div class="make">
<li>Attendency statistics</li>
<div class="flexible">
    <div>
        <li><i style="margin-right:10px; color:white;" class="fa-solid fa-signal"></i>173</li>
        <li style="margin-top:15px;">Total Records</li>
    </div>
    <div>
        
        <li><i style="margin-right:10px; color:white;" class="fa-solid fa-signal"></i>13</li>
        <li  style="margin-top:15px;">Classes Managed</li>
    </div>
    <div>
        
        <li><i style="margin-right:10px; color:white;" class="fa-solid fa-signal"></i></li>
        <li  style="margin-top:15px;">Last attendency</li>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>