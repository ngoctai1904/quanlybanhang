<?php
    $id = $_GET['id'];

    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    $sql_up = "SELECT * FROM products where prd_id = $id";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];

        if($_FILES['image']['name']==''){
            $image = $row_up['prd_name'];
        }else{
            $image = $row_up['prd_name'];
        }

        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];
        
        // $sql ="INSERT INTO products (prd_name, image, price, quantity, description, brand_id)
        // VALUES ('$prd_name', ' $image', ' $price', ' $quantity', '$description', '$brand_id')";
        $sql = "UPDATE products SET prd_name = '$prd_name', image = '$image', price = $price,
        quantity = $quantity, description = '$description' , brand_id = $brand_id WHERE prd_id = $id";
        $query = mysqli_query($connect, $sql);
        header('location: index.php?page_layout=danhsach');
    }
?>
<div class = "container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sua san pham</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype = "multipart/form-data">
                <div class ="form-group">
                    <label for="">Ten san pham</label>
                    <input type="text" name="prd_name" class="form-control" require value ="<?php echo $row_up['prd_name'];?>"> 
                </div>

                <div class ="form-group">
                    <label for="">Anh san pham</label><br>
                    <input type="file" name="image">
                </div>

                <div class ="form-group">
                    <label for="">Gia san pham</label>
                    <input type="number" name="price" class="form-control" require value ="<?php echo $row_up['price'];?>">
                </div>

                <div class ="form-group">
                    <label for="">So luong san pham</label>
                    <input type="number" name="quantity" class="form-control" require value ="<?php echo $row_up['quantity'];?>">
                </div>

                <div class ="form-group">
                    <label for="">Mo ta san pham</label>
                    <input type="text" name="description" class="form-control" require value ="<?php echo $row_up['description'];?>">
                </div>

                <div class="form-group">
                    <label for="">Thuong hieu</label>
                    <select class="form-control" name="brand_id">
                        <?php
                            while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                                <option value = "<?php echo $row_brand['brand_id'];?>"><?php echo $row_brand['brand_name'];?></option>
                            <?php } ?>
                    </select>
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Sua</button>
        </form>
        </div>
    </div>
</div>