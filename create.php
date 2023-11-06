<?php
    include "config.php";

    if(isset($_POST['submit'])) {
        try {
            $sql = "INSERT INTO users (firstname, lastname, email, password, gender, city) VALUES (:first, :last, :email, :password, :gender, :city)";
            $stmt = $conn->prepare($sql);
    
            $stmt->bindParam(':first', $_POST['firstname']);
            $stmt->bindParam(':last', $_POST['lastname']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':password', $_POST['password']);
            $stmt->bindParam(':gender', $_POST['gender']);
            $stmt->bindParam(':city', $_POST['city']);
    
            $stmt->execute();
    
            echo "New record created";
        }
        catch(PDOException $e) {
            echo "Error: record creation failed" . $e->getMessage();
        }
    }
    ?> 
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Register</title>
    </head>
    <body>
        <div class="container">
            <h1>Register</h1><br><br>
            <form method="post" action="">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>   
                <div class="form-group">  
                    <label>Gender</label>   
                    <div class="custom-control custom-radio">            
                    <input type="radio" name="gender" value="Male">Male <br>
                    <input type="radio" name="gender" value="Female">Female
                    </div>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <select name="city" class="form-control">
                    <option value="">Select</option>
                    <option value="Nagpur">Nagpur</option>
                    <option value="Pune">Pune</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Banglore">Banglore</option>
                    <option value="New Delhi">New Delhi</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Chennai">Chennai</option>
                </select>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </body>
    </html>
