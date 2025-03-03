<?php
session_start(); // Start session at the top

// Check if the user is NOT logged in
if (!isset($_SESSION['admin_email'])) {
    header("Location: ../../Logout_Login/Login.php"); // Redirect to login page
    exit();
}

// Check if the user is NOT an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <div class="modal fade show" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="false" style="display: block; position: relative;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Access Denied</h5>
                </div>
                <div class="modal-body">
                    You do not have permission to access this page.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="redirectBtn">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-backdrop fade show" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1040;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("redirectBtn").addEventListener("click", function () {
            window.location.href = "../../index.php"; // Redirect to home page
        });
    </script>
    ';
    exit(); // Stop further execution
}
?>
