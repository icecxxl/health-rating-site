<?php
if(isset($_POST['search'])) {
    // Get the search query
    $query = $_POST['search'];

    // Perform a database search for the query
    $results = perform_search($query);

    // Display the search results
    if(!empty($results)) {
        foreach($results as $result) {
            // Output the search result
            echo '<div class="result">';
            echo '<h3>'.$result['name'].'</h3>';
            echo '<p>'.$result['description'].'</p>';
            echo '</div>';
        }
    } else {
        // If no results are found, display a message
        echo '<p>No results found for "'.$query.'".</p>';
    }
}

// Function to perform a search on the database
function perform_search($query) {
    // Connect to the database
    $conn = new mysqli('localhost', 'username', 'password', 'database_name');

    // Build the SQL query
    $sql = "SELECT * FROM providers WHERE name LIKE '%$query%' OR description LIKE '%$query%'";

    // Execute the query
    $result = $conn->query($sql);

    // If there are results, fetch them and store them in an array
    if($result->num_rows > 0) {
        $results = array();
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        return $results;
    } else {
        // If no results are found, return an empty array
        return array();
    }
}
?>
