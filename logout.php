<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet">
    <style>
/* Logout Container */
.logout-container {
  max-width: 400px;
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  margin: 0 auto;
  position: relative;
  top: 400px; /* Adjust as needed */
}

.logout-container h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.logout-container p {
  font-size: 18px;
  margin-bottom: 30px;
}

.logout-container form {
  display: flex;
  justify-content: center;
}

.logout-container button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.logout-container button:hover {
  background-color: #0056b3;
}

  
</style>


</head>
<body>
    <div class="logout-container">
        <h1>Logout</h1>
        <p>Are you sure you want to logout?</p>
        <form action="logout_process.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>



  
