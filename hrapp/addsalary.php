<?php
session_start();
if (isset($_GET['bioid'])) {
    $bioid = $_GET['bioid'];
}
?>

<html>

<head>
    <title>HR APPLICATION</title>
    <link rel="website icon" type="jpg" href="C:\Users\Raja kumar\Pictures\getstart.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php include('includes/sidebar.php'); ?>

    <div class="main--contant">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Add Salary</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <p>Admin</p>
                </div>
                <img src="getstart.jpg" alt="" />
            </div>
        </div>
        <div class="card--container">
            <form action="addsalary1.php" method="POST">
                <h1 class="main--title">Add Salary</h1><br>
                <div style="border: 1px solid #ddd; padding: 10px; border-radius: 10px; margin-bottom: 20px;">
                    <input type="hidden" name="bioid" value="<?php echo $bioid; ?>" style="margin-top: 10px;">

                    <input type="text" step="any" required name="basicsalary" id="basicsalary" placeholder="Basic salary" oninput="updateTotal(); allowNumericInput('basicsalary');" style="width: 45%; margin-left: 25%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; margin-bottom: 10px; transition: border-color 0.3s ease-in-out; border-color: #007bff;  background-color: aliceblue;">

                    <input type="text" step="any" required name="allowance" id="allowance" placeholder="Allowance" oninput="updateTotal(); allowNumericInput('allowance');" style="width: 45%; padding: 10px; margin-left: 25%; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; margin-bottom: 10px; transition: border-color 0.3s ease-in-out; border-color: #007bff;  background-color: aliceblue;">

                    <input type="text" step="any" required name="total" id="total" placeholder="Total" style="width: 45%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-left: 25%; font-size: 16px; margin-bottom: 10px; transition: border-color 0.3s ease-in-out; border-color: #007bff;  background-color: aliceblue;"><br>

                    <label for="Date" style="font-weight: bold; color: #333; margin-left: 25%; margin-right: 10px;">Date :</label>

                    <input type="date" id="date" name="date" style="width: 40.5%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; margin-bottom: 10px; transition: border-color 0.3s ease-in-out; border-color: #007bff;  background-color: aliceblue;"><br>

                    <br><input type="submit" value="submit" style="background-color: #007bff; color: #fff; margin-left: 40%; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease-in-out;">
                </div><br>
            </form>
        </div>
    </div>

    <script>
        function updateTotal() {
            var basicSalary = parseFloat(document.getElementById('basicsalary').value) || 0;
            var allowance = parseFloat(document.getElementById('allowance').value) || 0;
            var total = basicSalary + allowance;

            document.getElementById('total').value = total;
        }

        function allowNumericInput(elementId) {
            var numericField = document.getElementById(elementId);

            numericField.addEventListener('input', function(event) {
                var inputValue = event.target.value;

                // Remove non-numeric characters from the input value
                var sanitizedValue = inputValue.replace(/[^0-9.]/g, '');

                // Update the input field value
                event.target.value = sanitizedValue;
            });
        }
    </script>

</body>

</html>
