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
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Admin</th>       
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../connection.php';
                                        $select_category = "SELECT c.*,u.username FROM tbl_category as c
                                        INNER JOIN tbl_user as u
                                        ON c.user_id=u.user_id 
                                        ";
                                        $ex = $conn->query($select_category);
                                        while ($row = mysqli_fetch_assoc($ex)) {
                                            echo '
                                                <tr>
                                                    <td>' . $row['cate_id'] . '</td>
                                                    <td>' . $row['cate_name'] . '</td>
                                                    <td class="text-success">' . $row['username'] . '</td>
                                                    <td>' . $row['created_at'] . '</td>
                                                    <td>' . $row['updated_at'] . '</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="delete_category.php?cate_id=' . $row['cate_id'] . '"   class="btn btn-outline-danger" onclick="return confirm(\'Are you sure?\')" >Delete</a>
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
                <form id="form" action="insert_category.php" method="POST" enctype="multipart/form-data">

                    <!-- Hidden Product ID (for update) -->
                    <input type="hidden" name="cate_id" id="cate_id">

                    <!-- Product Name -->
                    <div class="form-group mb-2">
                        <label for="cate_name" class="form-label">
                            <i class="fas fa-box"></i> Category
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="cate_name"
                            name="cate_name"
                            placeholder="Enter Category "
                            required>
                    </div>
                    <!-- Buttons -->
                    <button type="submit" id="create" name="create" class="btn btn-primary w-100 mb-2">
                        <i class="fas fa-plus"></i> Add Category
                    </button>

                    <button type="submit" id="update" name="update" class="btn btn-warning w-100">
                        <i class="fas fa-edit"></i> Update Category
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
            $('#staticBackdropLabel').text('Add Category')
            $('#form').trigger('reset')
            $('#form').attr('action', 'insert_category.php')
        })
        $(document).on('click', '#edit', function() {
            $('#create').hide()
            $('#update').show()
            $('#staticBackdropLabel').text('Update Category')
            $('#form').attr('action', 'update_category.php')
            const row = $(this).closest('tr');
            const id = row.find('td:eq(0)').text().trim()
            const cate_name = row.find('td:eq(1)').text().trim()
            
            
            $('#cate_id').val(id)
            $('#cate_name').val(cate_name)
            
        })
    })
</script>
<?php
include '../pages/footer.php';
?>