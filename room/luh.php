<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="text" id="myInput" oninput="getValue()">
    <input type="text">qty
    <p id="result">

        <script>
            function getValue() {
                // Get the input element
                var inputElement = document.getElementById("myInput");

                // Get the value of the input element
                var inputValue = inputElement.value;

                // Display the value in a paragraph or perform any desired action
                document.getElementById("result").textContent = "Input Value: " + inputValue;
            }
        </script>
</body>

</html>