<!DOCTYPE html>
<html>

<body>

    <h2>JavaScript Prompt</h2>

    <button onclick="myFunction()">Try it</button>

    <p id="demo"></p>

    <form id="myForm" action="adddept1.php" method="POST">
        <input type="hidden" id="departmentInput" name="department" value="">
    </form>

    <script>
        function myFunction() {
            let text;
            let department = prompt("Please enter your name:", "Harry Potter");
            if (department == null || department == "") {
                text = "User cancelled the prompt.";
            } else {
                text = "Hello " + department + "! How are you today?";
                // Set the value of the hidden input field
                document.getElementById("departmentInput").value = department;
                // Submit the form
                document.getElementById("myForm").submit();
            }
            document.getElementById("demo").innerHTML = text;
        }
    </script>

</body>

</html>
