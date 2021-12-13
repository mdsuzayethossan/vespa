<?php
require '../dashboard_includes/header.php';
?>

  <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header" style="background-color: orange;">
                        <h5 style="text-align: center; font-weight: 600; color: white;  padding: 10px 0; text-transform: UPPERCASE; font-family: 'Raleway', sans-serif; letter-spacing: 2px;">Add Banner</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Banner Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Type your title">
                            </div>
                            <div class="form-group">
                                <label for="">Banner Description</label>
                                <textarea name="description" class="form-control" id="" cols="100" rows="4" placeholder="Type your description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Banner Image</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="form-group">
                                <label for="">Button</label>
                                <input type="text" class="form-control" name="btn">
                            </div>
                            <div class="form-group text-center">
                            <button type="submit" style="background-color: orange; border-color: orange; letter-spacing: 2px;"
          class="btn btn-info">ADD BANNER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


<?php
require '../dashboard_includes/footer.php';
?>
<?php if(isset($_SESSION['invalid_extension'])) {?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['invalid_extension']?>',
        })
    </script>
<?php } unset($_SESSION['invalid_extension'])?>

<?php if(isset($_SESSION['invalid_size'])) {?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['invalid_size']?>',
        })
    </script>
<?php } unset($_SESSION['invalid_size'])?>

<?php if(isset($_SESSION['success'])) {?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Congratulations',
        text: '<?=$_SESSION['success']?>',
        })
    </script>
<?php } unset($_SESSION['success'])?>