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
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Profile</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../connection.php';
                                        $select_user = "SELECT * FROM tbl_user";
                                        $ex = $conn->query($select_user);
                                        while ($row = mysqli_fetch_assoc($ex)) {
                                            echo '
                                                        <tr>
                                                            <td>' . $row['user_id'] . '</td>
                                                            <td>' . $row['username'] . '</td>
                                                            <td>' . $row['email'] . '</td>
                                                            <td>' . $row['password'] . '</td>
                                                            <td class="'.($row['is_admin']==1?'text-success':'text-danger').'">' . ($row['is_admin'] == 1 ? 'admin' : 'user') . '</td>
                                                            <td>' . $row['created_at'] . '</td>
                                                            <td>' . $row['updated_at'] . '</td>
                                                            <td>
                                                                <img src="' . $row['profile'] . '" width="40px" height="40px" class="rounded-circle" alt="">
                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    <a href="delete_user.php?id='.$row['user_id'].'"  name="delete_user" class="btn btn-outline-danger" onclick="return confirm(\'Are you sure?\')" >Delete</a>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" action="../auth/insert.php" method="POST" id="registerForm">
                    <?php 
                        $_SESSION['insert']=1;
                     ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-2">
                        <label for="username" class="form-label">
                            <i class="fas fa-user"></i> Username
                        </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group mb-2" id="role">
                        <label for="is_admin" class="form-label">Role</label>
                        <select name="is_admin" class="form-select" id="is_admin">
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Create a strong password" required>
                    </div>

                    <button type="submit" id="create" name="register" class="btn btn-primary w-100">
                        <i class="fas fa-user-plus"></i> Register Account
                    </button>
                    <button type="submit" id="update" name="update" class="btn btn-warning w-100">
                        Update Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#create').show()
            $('#update').hide()
            $('#staticBackdropLabel').text('Register Account')
            $('#form').trigger('reset')
            $('#form').attr('action','../auth/insert.php')
            $('#role').hide()
        })
        $(document).on('click','#edit',function(){
            $('#create').hide()
            $('#update').show()
            $('#role').show()
            $('#staticBackdropLabel').text('Update Account')
            $('#form').attr('action','update_user.php')
            const row=$(this).closest('tr');
            const id=row.find('td:eq(0)').text().trim()
            const username=row.find('td:eq(1)').text().trim()
            const email=row.find('td:eq(2)').text().trim()
            const password=row.find('td:eq(3)').text().trim()
            const role=row.find('td:eq(4)').text().trim()
            let roles;
            if(role=='user'){
                roles=0;
            }else{
                roles=1;
            }
            console.log(roles);
            
            $('#id').val(id)
            $('#username').val(username)
            $('#email').val(email)
            $('#password').val(password)
            $('#is_admin').val(roles)
            if(roles==0){
                $('#is_admin').find('option[value="0"]').prop('selected', true)
            }else{
                $('#is_admin').find('option[value="1"]').prop('selected', true)
            }

            
        })
    })
</script>
<?php
include '../pages/footer.php';
?>
