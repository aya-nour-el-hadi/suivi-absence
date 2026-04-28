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
    background: white;
}

/* MAIN BOX */
.login-box {
    max-width: 1000px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    overflow: hidden;
}

/* LEFT SIDE */
.left-side {
    background:white;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
}

.left-side img {
    max-width: 100%;
}

/* RIGHT SIDE */
.right-side {
    padding: 40px;
}

/* INPUT */
.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #3b82f6;
}

.form-control {
    border-radius: 12px;
    padding-left: 40px;
    border: 1px solid #dbe7ff;
    background-color: #f8fbff;
}

.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.15);
}


.btn-primary {
    border-radius: 12px;
    background: #3b82f6;
    border: none;
}

.btn-primary:hover {
    background: #2563eb;
}

</style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="row login-box w-100">

        <!-- LEFT IMAGE -->
        <div class="col-md-6 left-side">
            <img src="{{ asset('images/shedule.png') }}" alt="">
        </div>

        <!-- RIGHT FORM -->
        <div class="col-md-6 right-side">

            <h3 class="mb-2">Welcome Back</h3>
            <p class="text-muted mb-4">Login to your account</p>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-3 input-wrapper">
                    <i class="bi bi-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email address" required>
                </div>

                <div class="mb-3 input-wrapper">
                    <i class="bi bi-lock input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>