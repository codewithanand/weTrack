
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to weTrack</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container mt-3">
                <form action="/home-regulance/partials/_handleLogin.php" method="post">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="loginEmail" id="loginEmail" aria-describedby="loginEmailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="loginPassword" id="loginPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>
