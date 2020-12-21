<script type="text/javascript" src="js/register.js"></script>
<div class="alert show d-none col-3 mx-auto mt-3" role="alert">
</div>
<form id="register-form" class="col-3 mx-auto mt-3 shadow p-3 mb-5 bg-white rounded">
    <h2 class="text-center fw-bold text-uppercase">REGISTER</h2>
    <div class="my-3">
        <label for="input-username" class="col-form-label">Username</label>
        <input id="input-username" class="form-control" type="text" minlength="6" maxlength="18" required/>
        <div id="username-help" class="form-text">Must be 6-18 characters long.</div>
    </div>

    <div class="my-3">
        <label for="input-password" class="col-form-label">Password</label>
        <input id="input-password" class="form-control" type="password" minlength="6" required/>
        <div id="password-help" class="form-text">Must be at least 6 characters long.</div>
    </div>

    <div class="my-3">
        <label for="input-password-re" class="col-form-label">Confirm Password</label>
        <input id="input-password-re" class="form-control" type="password" minlength="6" required/>
        <div id="password-re-help" class="form-text"> </div>
    </div>

    <button id="btn-register" class="btn btn-primary col-12" type="submit" value="register">Register</button>
</form>
