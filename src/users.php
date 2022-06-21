<?php
    include 'connection.php';
    include 'userserver.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <section style="min-width: 400px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5 bg-info">
                <a class="navbar-brand" href="#!">ADMIN DASHBOARD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">About</a></li> -->

                    </ul>
                    <button class='btn btn-outline-dark ms-1' id='logoutbtn'>logout</button>

                    <a class='btn btn-outline-dark ms-1' id='loginbtn' href="admin.php">Back</a>

                </div>
            </div>
        </nav>
    </section>



    <div class="container-fluid pt-4 px-4 bg-info">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">ALL USERS</h6>
            </div>

            <div class="table-responsive ">
                <table id="display_table" class="table text-start align-middle table-bordered table-hover mb-0">
                </table>
            </div>
        </div>
    </div>




    <div class="modal fade" id="editBtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">User Id:</label>
                            <input type="text" class="form-control" disabled id="userid" value="123">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">User Name:</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">User Email:</label>
                            <input type="text" class="form-control" id="useremail">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Role:</label>
                            <!-- <input type="text" class="form-control" id="recipient-name"> -->
                            <select class="form-select" id="roleid" aria-label="Default select example">
                                <option selected disabled>Select Role</option>
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="editedContentBtnId" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function () {

            display_all_users();

            function display_all_users() {
                $.ajax({
                    url: 'userserver.php',
                    method: 'POST',
                    data: { 'display_all_user': true },
                    success: function (result) {
                        $('#display_table').html(result);
                    }
                });
            }

            $("#display_table").on("click", '.deleting_user', function () {
                var id = $(this).attr('id');
                alert(id);
                $.ajax({
                    url: 'userserver.php',
                    method: 'POST',
                    data: { 'delete_user_id': id },
                    success: function (result) {
                        display_all_users();
                        alert(result);

                    }
                });
            });

            $("#display_table").on("click", ".edit_row", function () {
                var edit_id = $(this).attr('id');
                // 
                // alert(role);
                $.ajax({
                    url: 'userserver.php',
                    type: "POST",
                    data: { useridforedit: edit_id },
                    success: function (result) {
                        console.log(result);
                        var user = JSON.parse(result);

                        $("#userid").val(user[0]['userid']);
                        $("#username").val(user[0]['username']);
                        $("#useremail").val(user[0]['email']);
                        // $("#roleid").val(user[0]['role']);

                    }
                });

            });

            $("#editedContentBtnId").click(function () {
                var uid = $("#userid").val();
                var uname = $("#username").val();
                var umail = $("#useremail").val();
                var role = $("#roleid option:selected").text();
                alert(role);
                $.ajax({
                    url: 'userserver.php',
                    type: "POST",
                    data: { userid_for_edit_then_Update: uid, username_for_edit_then_Update: uname, usermail_for_edit_then_Update: umail, role_for_edit_then_Update: role },
                    success: function (result) {
                        alert(result);
                        display_all_users();
                        window.location = 'users.php';
                    }
                });
            });

            $(document).on("click","#logoutbtn",function(){
                $.ajax({
                url:'checkloginlogout.php',
                method:'POST',
                data:{'logout_value':1},
                success:function(result){
                //    console.log(result);
                    if(result == "sujeet"){
                        window.location = 'index.php';
                    }
                }
                });
            });

        });
    </script>
</body>

</html>