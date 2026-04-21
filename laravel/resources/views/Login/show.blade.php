<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body {
    background: #f5f9ff; /* light white-blue background */
}

/* CARD */
.login-card {
    width: 380px;
    border: none;
    border-radius: 16px;
    background: #ffffff;
    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
}

/* TITLE */
.title {
    font-weight: 700;
    color: #1f3b57;
}

/* INPUT WRAPPER */
.input-wrapper {
    position: relative;
}

/* ICON */
.input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #3b82f6; /* blue */
}

/* INPUT */
.form-control {
    border-radius: 12px;
    padding-left: 40px;
    border: 1px solid #dbe7ff;
    background-color: #f8fbff;
    transition: 0.2s;
}

/* FOCUS */
.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.15);
    background: #fff;
}

/* BUTTON */
.btn-primary {
    border-radius: 12px;
    padding: 10px;
    font-weight: 600;
    background: #3b82f6;
    border: none;
}

.btn-primary:hover {
    background: #2563eb;
}

/* TEXT LINK */
a {
    color: #3b82f6;
}

</style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card login-card p-4">

        <div class="text-center mb-4">
            <h3 class="title">Welcome Back</h3>
            <p class="text-muted small">Login to your account</p>
        </div>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <!-- EMAIL -->
            <div class="mb-3 input-wrapper">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" name="email" class="form-control" placeholder="Email address" required>
            </div>

            <!-- PASSWORD -->
            <div class="mb-3 input-wrapper">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>