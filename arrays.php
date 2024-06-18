<?php
// array.php

// Predefined password
$correct_password = "securepassword";

// Flag to keep track of whether the password is correct
$password_matched = false;

// Loop until the correct password is entered
do {
    // If form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['password'];

        // Verify the password
        if ($password == $correct_password) {
            $password_matched = true;

            // Define an array with some initial values
            $fruits = ["Apple", "Banana", "Cherry", "Date", "Elderberry"];

            // Add a few more elements to the array
            array_push($fruits, "Fig", "Grape", "Honeydew");

            // Function to display the array elements
            function displayArray($array) {
                echo "<ul>";
                foreach ($array as $item) {
                    echo "<li>$item</li>";
                }
                echo "</ul>";
            }

            // Call the function to display the array
            displayArray($fruits);
        } else {
            echo "<p style='color: red;'>Incorrect password. Please try again.</p>";
            displayForm();
        }
    } else {
        displayForm();
    }
} while (!$password_matched);

// Function to display the password form
function displayForm() {
    echo '
    <form method="post" action="">
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="submit" value="Submit">
    </form>
    ';
}
?>

