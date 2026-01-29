<?php
include '../pages/header.php';
?>

<!--! ================================================================ !-->
<!--! [End] Header !-->
<!--! ================================================================ !-->
<!--! ================================================================ !-->
<!--! [Start] Main Content !-->
<!--! ================================================================ !-->
<main class="nxl-container">
    <div class="nxl-content">

        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-header">
                            <h5 class="card-title">Product List</h5>
                            <!-- Button trigger modal -->
                            <button id="add" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                +Add User
                            </button>
                        </div>
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 text-center">
                                    <thead>
                                        <tr class="border-b">
                                            <th>Product ID</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Admin</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../connection.php';
                                        $select_product = "SELECT p.*,c.cate_id,c.cate_name,u.username FROM tbl_product as p
                                        INNER JOIN tbl_category as c
                                        ON p.cate_id=c.cate_id
                                        INNER JOIN tbl_user as u
                                        ON p.user_id=u.user_id 
                                        ";
                                        $ex = $conn->query($select_product);
                                        while ($row = mysqli_fetch_assoc($ex)) {
                                            echo '
                                                <tr>
                                                    <td>' . $row['pro_id'] . '</td>
                                                    <td>' . $row['pro_name'] . '</td>
                                                    <td>' . $row['price'] . '</td>
                                                    <td>' . $row['description'] . '</td>
                                                    <td data-cate-id="' . $row['cate_id'] . '">' . $row['cate_name'] . '</td>
                                                    <td class="text-success">' . $row['username'] . '</td>
                                                    <td>' . $row['created_at'] . '</td>
                                                    <td>' . $row['updated_at'] . '</td>
                                                    <td>
                                                        <img src="'. $row['image'].'" width="40px" height="40px" class="rounded-circle">
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="delete_product.php?pro_id=' . $row['pro_id'] . '"  name="delete_user" class="btn btn-outline-danger" onclick="return confirm(\'Are you sure?\')" >Delete</a>
                                                            <button id="edit" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                <li>
                                    <a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
                                </li>
                                <li><a href="javascript:void(0);" class="active">1</a></li>
                                <li><a href="javascript:void(0);">2</a></li>
                                <li>
                                    <a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
                                </li>
                                <li><a href="javascript:void(0);">8</a></li>
                                <li><a href="javascript:void(0);">9</a></li>
                                <li>
                                    <a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" action="insert_product.php" method="POST" enctype="multipart/form-data">

                    <!-- Hidden Product ID (for update) -->
                    <input type="hidden" name="pro_id" id="pro_id">

                    <!-- Product Name -->
                    <div class="form-group mb-2">
                        <label for="pro_name" class="form-label">
                            <i class="fas fa-box"></i> Product Name
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="pro_name"
                            name="pro_name"
                            placeholder="Enter product name"
                            required>
                    </div>

                    <!-- Price -->
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">
                            <i class="fas fa-dollar-sign"></i> Price
                        </label>
                        <input
                            type="number"
                            step="0.01"
                            class="form-control"
                            id="price"
                            name="price"
                            placeholder="Enter price"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i> Description
                        </label>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            rows="3"
                            placeholder="Product description"
                            required></textarea>
                    </div>

                    <!-- Image URL -->
                    <div class="form-group mb-2">
                        <label for="image" class="form-label">
                            <i class="fas fa-image"></i> Image
                        </label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image"
                            required>
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-2">
                        <label for="cate_id" class="form-label">
                            <i class="fas fa-tags"></i> Category
                        </label>
                        <select name="cate_id" id="cate_id" class="form-select" required>
                            <option value="" selected disabled>-- Select Category --</option>
                            <?php 
                                $select_category="SELECT cate_name,cate_id FROM tbl_category";
                                $ex=$conn->query($select_category);
                                while($row=mysqli_fetch_assoc($ex)){
                                    echo '
                                        <option value="'.$row['cate_id'].'">'.$row['cate_name'].'</option>
                                    ';
                                }
                             ?>
                        </select>
                    </div>

                    <!-- User ID (owner / seller) -->
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">

                    <!-- Buttons -->
                    <button type="submit" id="create" name="create" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-plus"></i> Add Product
                    </button>

                    <button type="submit" id="update" name="update" class="btn btn-warning w-100">
                        <i class="fas fa-edit"></i> Update Product
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#create').show()
            $('#update').hide()
            $('#staticBackdropLabel').text('Add Product')
            $('#form').trigger('reset')
            $('#form').attr('action', 'insert_product.php')
        })
        $(document).on('click', '#edit', function() {
            $('#create').hide()
            $('#update').show()
            $('#staticBackdropLabel').text('Update Product')
            $('#form').attr('action', 'update_product.php')
            const row = $(this).closest('tr');
            const id = row.find('td:eq(0)').text().trim()
            const pro_name = row.find('td:eq(1)').text().trim()
            const price = row.find('td:eq(2)').text().trim()
            const des = row.find('td:eq(3)').text().trim()
            const cate = row.find('td:eq(4)').data('cate-id');
            
            

            $('#id').val(id)
            $('#pro_name').val(pro_name)
            $('#price').val(price)
            $('#description').val(des)
            $('#cate_id').val(String(cate));



        })
    })
</script>
<?php
include '../pages/footer.php';
?>