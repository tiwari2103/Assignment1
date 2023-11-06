<?php
    include "config.php";

    $sql  ="SELECT *FROM users";
    $result = $conn->query($sql);
?>

<?php
    include "config.php";

    echo '<style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }
    </style>';

    
    try {
        $sql ="SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo "<div class='container'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>Gender</th>";
        echo "<th>City</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
?>
