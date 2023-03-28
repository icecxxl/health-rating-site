<?php
// Establish a database connection
$host = 'localhost';
$user = 'username';
$pass = 'password';
$dbname = 'database_name';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Retrieve the search term from the query string
$search_term = $_GET['search_term'];

// Create a SQL query to search the database
$query = "SELECT * FROM table_name WHERE column_1 LIKE '%{$search_term}%' OR column_2 LIKE '%{$search_term}%'";

// Execute the query
$result = mysqli_query($conn, $query);

// Display the search results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Result: {$row['column_1']} - {$row['column_2']}<br>";
    }
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>
