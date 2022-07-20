<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <center>
        <div class="main">
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <label for="">Name:</label>
            <input type="text" name="name"><br>
            <label for="">Price:</label>
            <input type="text" name="price"><br>
            <label for="">Image:</label>
            <input type="file" name="image"><br>
            <button type="submit" name="upload">Upload</button>
        </form>
        </div>
    </center>

    <!-- fetch data -->
     <div class="container">
    <table >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include 'config.php';
    $pic=mysqli_query($con,"SELECT * FROM `card` ");
    while($row=mysqli_fetch_array($pic)){
        echo "
        <tr>
        <td>$row[Id]</td>
        <td>$row[Name]</td>
        <td>$row[Price]</td>
        <td><img src='$row[Image]'width='200px' height='90px'></td>
        <td><a href='delete.php? Id=$row[Id]' class='btn btn-danger'>Delete</a></td>
        <td><a href='update.php? Id=$row[Id]' class='btn btn-danger'>Update</a></td>
        </tr>
        ";
    }
    ?>
  </tbody>
</table>
</div>
</body>
</html>