<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Password</h6>
    </div>
    <div class="card-body">
        <form action="admin/proses/update_password.php?i=<?= password_hash($_SESSION['id'],PASSWORD_DEFAULT)?>"
            method="post">
            <div class="form-group">
                <label for="pass">Password Baru</label>
                <input type="text" name="pass" class="form-control" id="pass">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>