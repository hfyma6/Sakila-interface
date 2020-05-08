<table class="table">
    <thead>
        <tr>
            <th>category id</th>
            <th>name</th>
            <th>last_update</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $conn=mysqli_connect("localhost","root","","sakila" );
                $result = mysqli_query($conn,"SELECT * FROM `category`");
                while($row=mysqli_fetch_array($result)):

            ?>
            <tr>
                    <td><?php echo $row['category_id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['last_update'] ?></td>

            </tr>
                <?php endwhile; ?>
                </tbody>
        </table>

<link rel="stylesheet" href="css/bootstrap.css" />
