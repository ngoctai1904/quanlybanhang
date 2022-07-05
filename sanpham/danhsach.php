<?php
    $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
    $query = mysqli_query($connect, $sql);
?>
<div class ="container-fluid">
    <div class="card">
        <div class ="card-header">
            <h2>Danh sach san pham</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Ten san pham</th>
                        <th>Anh san pham</th>
                        <th>Gia san pham</th>
                        <th>So luong san pham</th>
                        <th>Mo ta</th>
                        <th>Thuong hieu</th>
                        <td>Sua</td>
                        <td>Xoa</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['prd_name']; ?></td>

                        <td>
                            <img src="img/<?php echo $row['image']; ?>">
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['brand_name']; ?></td>
                        <th>
                            <a href="index.php?page_layout=sua&id=<?php $row ['prd_id']; ?>">Sua</a>
                        </th>
                        <th>
                        <a onclick="return Del('<?php echo $row['prd_name']; ?>')" href="index.php?page_layout=xoa&id=<?php $row ['prd_id']; ?>">Xoa</a>
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="index.php?page_layout=them">Thêm mới</a>
        </div>
    </div>
</div>
<script>
    function Del(name){
        return confirm("ban co chac chan xoa san pham: " + name + " ? ");
    }
</script>