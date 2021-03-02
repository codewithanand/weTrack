
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up for a weTrack account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container mt-3 mb-3">
          <form action="/home-regulance/partials/_handleSignup.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" maxlength="11" name="fname" class="form-control" id="fname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" maxlength="11" name="lname" class="form-control" id="lname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="uname" class="form-label">User Name</label>
                <input type="text" maxlength="10" name="uname" class="form-control" id="uname" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-10">
                <label for="email" class="form-label">Email address</label>
                <input type="email" maxlength="25" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="signupPassword" class="form-label">Password</label>
                <input type="password" maxlength="11" name="signupPassword" class="form-control" id="signupPassword">
            </div>
            <div class="mb-3 col-md-6">
                <label for="signupCPassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="11" name="signupCPassword" class="form-control" id="signupCPassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>