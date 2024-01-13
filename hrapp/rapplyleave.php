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
   
<?php include('includes/sidebar2.php'); ?>

    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Apply Leave</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                <p>User</p>
                    
                </div>
            
                <img src="getstart.jpg" alt=""/>
            </div>
        </div>
        <div class="card--container">
        <form action="rapplyleave1.php" method="POST">
            <h1 class="main--title">Apply Leave</h1><br>
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
            
             
             <label for="startdate"  style="font-weight: bold;
             color: #333;
             margin-left: 25%;
             margin-right: 10px;">startdate</label>
             
             <input type="date" id="startdate" name="startdate" 
             style=" padding: 5px;
             border: 1px solid #ccc; 
             border-radius: 5px; 
             width: 165px;
             transition: border-color 0.3s ease-in-out;
             border-color: #007bff; 
             background-color: aliceblue;">
         
         <span style="padding-left: 100px;">
         <label for="enddate"  style="font-weight: bold;
         color: #333;
         margin-right: 10px;">enddate</label>
         
         <input type="date" id="enddate" name="enddate" 
         style=" padding: 5px;
         border: 1px solid #ccc; 
         border-radius: 5px; 
         width: 165px;
         transition: border-color 0.3s ease-in-out;
         border-color: #007bff; 
         background-color: aliceblue;"><br><br>
         
         <label for="leavetype" 
             style="font-weight: bold;
             color: #333; 
             margin-left: 25%;
             margin-right: 10px;">Leave type:</label>
                    
                    <select id="leavetype" name="leavetype" 
                     style="width: 37.3%;
                         padding: 10px;
                         border: 1px solid #ccc;
                         border-radius: 5px;
                         font-size: 16px;
                         margin-bottom: 10px;
                         transition: border-color 0.3s ease-in-out;
                         border-color: #007bff; 
                         background-color: aliceblue;" required>
                         <option value="select">-----Select Leave type-----</option>
                         <option value="Sick Leave">Sick Leave</option>
                         <option value="Comp-off">Comp-off</option>
                         <option value="Casual Leave">Casual Leave</option>
                         <option value="Maternity Leave">Maternity Leave</option>
                         <option value="Vacation Leave">Vacation Leave</option>
                         <option value="Special Casual Leave">Special Casual Leave</option>
                     </select><br>
                     <script src= "phonenumber.js"></script>
                     <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phonenumber" 
                     style="width: 45%;
                     padding: 10px;
                     border: 1px solid #ccc;
                     margin-left: 25%;
                     border-radius: 5px;
                     font-size: 16px;
                     margin-bottom: 10px;
                     transition: border-color 0.3s ease-in-out;
                     border-color: #007bff; 
                     background-color: aliceblue;" required><br>
          
          
         
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
             padding: 10px 20px;
             border: none;
             border-radius: 5px;
             font-size: 16px;
             margin-left: 45%;
             cursor: pointer;
             transition: background-color 0.3s ease-in-out;">
         
         </div>
         

        </div>
    </div>
</body>
</html>
