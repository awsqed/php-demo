<script type="text/javascript" src="js/profile.js"></script>
<div class="card col-3 mx-auto mt-3">
    <h5 class="card-header text-center fw-bold text-uppercase">
        <?= @$data['username'] ?>'s Profile
    </h5>
    <form id="profile-form">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="input-fname" class="col-form-label fw-bold">First name</label></td>
                        <td><input id="input-fname" class="form-control" type="text" maxlength="255" value="<?= @$data['first_name'] ?>" disabled/></td>
                    </tr>
                    <tr>
                        <td><label for="input-lname" class="col-form-label fw-bold">Last name</label></td>
                        <td><input id="input-lname" class="form-control" type="text" maxlength="255" value="<?= @$data['last_name'] ?>" disabled/></td>
                    </tr>
                    <tr>
                        <td><label for="input-gender" class="col-form-label fw-bold">Gender</label></td>
                        <td>
                            <select id="input-gender" class="form-select" aria-label="Gender" disabled>
                                <option value="0" <?php echo $data['gender'] ? '' : 'selected' ?>>Male</option>
                                <option value="1" <?php echo $data['gender'] ? 'selected' : '' ?>>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="input-birthday" class="col-form-label fw-bold">Date of Birth</label></td>
                        <td><input id="input-birthday" class="form-control" type="date" value="<?= @$data['date_of_birth'] ?>" disabled/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="float-start">
                <button id="btn-edit-save" class="btn btn-warning" type="submit">Edit</button>
                <button id="btn-delete-account" class="btn btn-danger" type="button">Delete Account</button>
            </div>
            <div class="float-end">
                <button id="btn-logout" class="btn btn-dark" type="button">Logout</button>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
</div>