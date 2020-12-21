<script type="text/javascript" src="js/login.js"></script>
<div class="alert show d-none col-3 mx-auto mt-3" role="alert">
</div>
<form id="login-form" class="col-3 mx-auto mt-3 shadow p-3 mb-5 bg-white rounded">
    <h2 class="text-center fw-bold text-uppercase">LOGIN</h2>
    <div class="my-3">
        <label for="input-username" class="col-form-label">Username</label>
        <input id="input-username" class="form-control" type="text" minlength="6" maxlength="18" required/>
    </div>

    <div class="my-3">
        <label for="input-password" class="col-form-label">Password</label>
        <input id="input-password" class="form-control" type="password" minlength="6" required/>
    </div>

    <button id="btn-login" class="btn btn-primary col-12" type="submit" value="login">Login</button>
</form>
