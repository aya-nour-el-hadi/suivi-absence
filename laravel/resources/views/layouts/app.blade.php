<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>

<style>
  
body{
    margin:0;
    font-family: system-ui, -apple-system, Segoe UI, sans-serif;
    background:#f6f7fb;
    color:#0f172a;
}
.content{
    margin-left:260px;
    padding:0; 
}

.content > *:first-child{
    margin-top:0 !important;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:260px;
    height:100vh;
   background:#f6f7fb;
    border-right:1px solid #e2e8f0;
    padding:22px;
    display:flex;
    flex-direction:column;
}


.logo{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:700;
    font-size:16px;
    margin-bottom:30px;
    color:#0f172a;
}

.logo-box{
    width:40px;
    height:40px;
    border-radius:14px;
    background:linear-gradient(135deg,#e8f1ff,#f1f5ff);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#3b82f6;
    box-shadow:0 6px 14px rgba(59,130,246,0.15);
}


.menu{
    display:flex;
    flex-direction:column;
    gap:8px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:11px 12px;
    border-radius:12px;
    text-decoration:none;
    color:#64748b;
    font-size:14px;
    transition:0.25s ease;
}

.menu a i{
    width:18px;
    height:18px;
}

.menu a:hover{
    background:#f1f5f9;
    color:#0f172a;
    transform:translateX(5px);
}

.menu a.active{
    background:#e8f1ff;
    color:#3b82f6;
    font-weight:600;
    box-shadow:0 8px 20px rgba(59,130,246,0.15);
}


.card-soft{
    background:#fff;
    border:1px solid #e2e8f0;
    border-radius:16px;
    padding:18px;
    box-shadow:0 6px 18px rgba(0,0,0,0.03);
}

@media(max-width:768px){
    .sidebar{
        width:100%;
        height:auto;
        position:relative;
        flex-direction:row;
        overflow-x:auto;
    }

    .menu{
        flex-direction:row;
        gap:10px;
    }

    .content{
        margin-left:0;
        padding:15px;
    }
}
</style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        <div class="logo-box">
            <i data-lucide="bar-chart-3"></i>
        </div>
        Attendance
    </div>

<div class="menu">

    <a href="{{ route('admin.dashboard') }}" class="active">
        <i data-lucide="layout-dashboard"></i>
        Dashboard
    </a>

    <a href="{{ route('stagiaires.index') }}">
        <i data-lucide="users"></i>
        Stagiaires
    </a>

    <a href="{{ route('stagiaires.create') }}">
        <i data-lucide="user-plus"></i>
        Add Stagiaire
    </a>

    <a href="{{ route('absences.index') }}">
        <i data-lucide="alert-circle"></i>
        Absences
    </a>

    <a href="{{ route('absences.create') }}">
        <i data-lucide="plus-circle"></i>
        Add Absence
    </a>

    <a href="{{ route('sanctions.index') }}">
        <i data-lucide="shield"></i>
        Sanctions
    </a>

    <a href="{{ route('sanctions.create') }}">
        <i data-lucide="file-plus"></i>
        Add Sanction
    </a>

    <a href="{{ route('cefs.index') }}">
    <i data-lucide="building-2"></i>
     CEF
   </a>

@auth
    <a href="{{ route('logout') }}">
    <i data-lucide="log-out"></i>
    Déconextion
    </a>
@endauth

</div>

</div>


<style>
    .success-alert {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 15px;
        font-size: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .success-alert .close-btn {
        background: none;
        border: none;
        font-size: 18px;
        color: #065f46;
        cursor: pointer;
        opacity: 0.7;
        transition: 0.2s;
    }

    .success-alert .close-btn:hover {
        opacity: 1;
    }
</style>

<div class="content">
@if (session('success'))
    <div class="success-alert">
        <span>{{ session('success') }}</span>
        <button class="close-btn" onclick="this.parentElement.style.display='none'">&times;</button>
    </div>
@endif
    @yield('content')
</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>