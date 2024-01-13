<html>
<head>
        <title>HR APPLICATION</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="website icon" type="jpg" href="C:\Users\Raja kumar\Pictures\getstart.jpg">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>   
        <link rel="stylesheet" href="style.css"/> 

<style>
canvas {
    width: 100% !important;
    height: 300px !important;
    object-fit: contain;
}
</style>    

    </head>
<body>

<?php include('includes/sidebar1.php'); ?>

    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Apply Permission</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
        <form action="applypermission1.php" method="POST">
            <h1 class="main--title">Apply Permission</h1><br>
            <div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px; margin-bottom: 20px;">

            
   <br> <input type="text" required name="title" placeholder="title" 
    style="width: 45%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-left: 25%;
        margin-bottom: 10px;
        transition: border-color 0.3s ease-in-out;
        border-color: #007bff; 
        background-color: aliceblue;"><br>

<label for="date"  style="font-weight: bold;
color: #333;
margin-left: 40%;
margin-right: 10px;">Date</label>

<input type="date" id="date" name="date" 
style=" padding: 5px;
border: 1px solid #ccc; 
border-radius: 5px; 
width: 165px;
transition: border-color 0.3s ease-in-out;
border-color: #007bff; 
background-color: aliceblue;"><br><br>


<label for="starttime"  style="font-weight: bold;
color: #333;
margin-left: 25%;
margin-right: 10px;">starttime</label>

<input type="time" id="starttime" name="starttime" 
style=" padding: 5px;
border: 1px solid #ccc; 
border-radius: 5px; 
width: 165px;
transition: border-color 0.3s ease-in-out;
border-color: #007bff; 
background-color: aliceblue;">
<span style="padding-left: 100px;">
<label for="endtime"  style="font-weight: bold;
color: #333;
margin-right: 10px;">endtime</label>

<input type="time" id="endtime" name="endtime" 
style=" padding: 5px;
border: 1px solid #ccc; 
border-radius: 5px; 
width: 165px;
transition: border-color 0.3s ease-in-out;
border-color: #007bff; 
background-color: aliceblue;"><br><br>

            <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phonenumber" 
            style="width: 45%;
            padding: 10px;
            margin-left: 25%;

            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
            transition: border-color 0.3s ease-in-out;
            border-color: #007bff; 
            background-color: aliceblue;" required>


 
 

 <textarea id="reason" name="reason" rows="4" cols="50" placeholder="Reason" 
 style="width: 45%;
 padding: 10px;
 margin-left: 25%;

 border: 1px solid #ccc;
 border-radius: 5px;
 font-size: 16px;
 margin-bottom: 10px;
 transition: border-color 0.3s ease-in-out;
 border-color: #007bff;
 background-color: aliceblue;" required></textarea> <br>



    <input type="submit" value="Request" 
    style="background-color: #007bff; 
    color: #fff; 
    margin-left: 45%;

    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;">
    </div>

        </form>

        </div>
    </div>
</body>
</html>
