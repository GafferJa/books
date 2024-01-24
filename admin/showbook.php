<?php
require_once "header.php";

$sql = "SELECT users.id, users.name, category.*, books.* FROM books
        JOIN users ON users.id=books.author_id
        JOIN category ON category.cid=books.category_id";
$bookQuery = mysqli_query($conn, $sql);

?>


<div class="row">
    <div class="col-md-12">
        <h1>Book List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author Id</th>
                    <th>Category Id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Page Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($bookQuery as $key) { ?>
                <tbody>
                    <tr>
                        <td><?= $key['bid'] ?></td>
                        <td><?= $key['name'] ?></td>
                        <td><?= $key['cat_name'] ?></td>
                        <td><?= $key['title'] ?></td>
                        <td><?= $key['price'] ?></td>
                        <td><img src="../uploads/<?= $key['image'] ?>" alt="" width="50"></td>
                        <td><?= $key['page_number'] ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $key["bid"]; ?>"><button class="btn btn-success">Edit</button></a>
                            <a href="category.php?id=<?php echo $key["bid"]; ?>"><button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>


<?php
require_once "footer.php";
?>