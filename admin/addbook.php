<?php
require_once "header.php";

$catSql = "SELECT * FROM category";
$catResult = mysqli_query($conn, $catSql);

if (!empty($_POST)) {
    $author_id = $loginuser['id'];
    $category_id = $_POST["category_id"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $page_number = $_POST["page_number"];
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = '../uploads/';
        move_uploaded_file($tmp, $path . $image);
    }
    $sql = "INSERT INTO books (author_id, category_id, title, price, page_number, image) 
            VALUES ('$author_id','$category_id','$title','$price', '$page_number', '$image')";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "Book Added Successfully";
    } else {
        echo "Error inserting data";
    }
}

?>


<div class="row">
    <div class="col-md-12">
        <h1>Add Book</h1>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php
            unset($_SESSION['success']);
        endif;
        ?>
    </div>
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-gorup mb-2">
                <label for="category">Category</label>
                <select name="category_id" id="category" required class="form-control">
                    <?php foreach ($catResult as $cat) : ?>
                        <option value="<?= $cat['cid'] ?>">
                            <?= $cat['cat_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="page_number">Page Number</label>
                <input type="number" name="page_number" id="page_number" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success">Add Book</button>
            </div>
        </form>
    </div>
</div>


<?php
require_once "footer.php";
?>