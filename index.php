<?php
$conn=mysqli_connect('localhost','root','','curd');
if(!$conn){
    echo "not connected <hr>";

}
?>
<?php
if(isset($_POST['save'])){
   $name=$_POST['name'];
    $last_name=$_POST['last_name'];
    $city_name=$_POST['city_name'];
    $email=$_POST['email'];

    $sql="INSERT INTO users (name,last_name,city_name,email) VALUES ('$name','$last_name','$city_name','$email')";
    if(mysqli_query($conn,$sql)){
       echo "Inserted successfully";
    }

}
?>
<?php
if(isset($_POST['delete'])) {
 echo "dsfdf";
}


?>




<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, curd!</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>



<!-- Button trigger modal -->
<div class="container "style="padding-top: 50px">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card-body">
                <form method="post" action="#">
                    <div class="mb-3">
                    First name:<br>
                    <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                    Last name:<br>
                    <input type="text" name="last_name" class="form-control">
                    </div>
                    <div class="mb-3">
                    City name:<br>
                    <input type="text" name="city_name" class="form-control">
                    </div>
                    <div class="mb-3">
                    Email Id:<br>
                    <input type="email" name="email" class="form-control">
                    </div>
                    <div class="modal-footer" style="display: flex;justify-content: center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="save" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</div>
<div class="container">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">City</th>
            <th scope="col">Email</th>
            <th scope="col">Operation</th>
        </tr>
        </thead>

        <?php
        $sql="SELECT * FROM users";
        $duery=mysqli_query($conn,$sql);
        if (mysqli_num_rows($duery) > 0) {
        ?>
        <tbody>
            <tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($duery)) {
                ?>
                <th scope="row"><?php echo $row['id'];?></th>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['city_name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td>
                    <a type="button" name="delete" class="btn btn-danger btn-sm"
                    <a href="delete.php?id=<?php echo $row["id"]; ?>"
                    >Delete</a>
                    <button type="button"
                            href="update.php?id=<?php echo $row["id"]; ?>"
                            class="btn btn-secondary btn-sm">Update</button>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>



        </tbody>
    </table>
    <?php
    }
    else{
        echo "No result found";
    }
    ?>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>