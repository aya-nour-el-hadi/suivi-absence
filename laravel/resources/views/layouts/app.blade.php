<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('stagiaire.index') }}">List Stagiaires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('stagiaire.create') }}">Ajouter Stagiaire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('absence.index') }}">List d'absence</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('absence.create') }}">Ajouter Absence</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('CEF.index') }}">List CEF</a>
      </li>
        <li class="nav-item">
         <a class="nav-link" href="{{ route('sanction.index') }}">List sanction</a>
      </li>
        <li class="nav-item">
         <a class="nav-link" href="{{ route('sanction.create') }}">Ajoueter sanction</a>
      </li>
    </ul>
  </div>
</nav>


  @yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>