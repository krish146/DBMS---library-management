<!DOCTYPE HTML>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        .sub {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div > library Management <div>
<form id="contact-form" method="post" >
                <br>
                <label  for="BookName">Book Name: </label><input name='BookName' placeholder="Name" id="name" type="text" /><br>
                <label  for="SubjectName">Subject Name: </label><input  name='SubjectName' placeholder="subject" id="subject" type="text" /><br>
                <label  for="CountOfBooks">Count : </label><input name='CountOfBooks' placeholder="quantity" id="count" type="number" /><br>
 <input class = " sub" type="submit" name='click' value="send">
            </form>

    <br>
    <button id="showtext" >Show Table</button>



<script>
document.getElementById('showtext').addEventListener('click', function() {
    // Use AJAX (JavaScript) to fetch and display PHP-generated content
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('phpTextBlock').innerHTML = xhr.responseText;
        }
    };

    // Replace 'your_table_name_here' with the actual table name
    var tableName = 'library';
    xhr.open('GET', 'showtable.php?table=' + tableName, true);
    xhr.send();
});

</script>


<div id="phpTextBlock">
    <!-- PHP echo text will be displayed here -->
</div>
</body>
</html>

<?php 
$conn = mysqli_connect('localhost','root','','krish123_super');


if (mysqli_connect_errno()) {
    printf('connection failed', mysqli_connect_error());
    exit(1);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $BookName = $_POST["BookName"];
    $SubjectName= $_POST["SubjectName"];
    $CountOfBooks= $_POST["CountOfBooks"];

    $sql = "INSERT INTO library ( BookName, SubjectName,CountOfBooks) VALUES ('$BookName', '$SubjectName','$CountOfBooks')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a new page or the same page to avoid form resubmission
        echo "submitted";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
