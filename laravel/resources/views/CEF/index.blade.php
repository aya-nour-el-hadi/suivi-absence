@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

/* ================= BODY ================= */
body{
    background:#ffffff;
    font-family:"Segoe UI", sans-serif;
}

/* PAGE */
.wrapper{
    padding:25px;
}

/* HEADER */
.header{
    background:#ffffff;
    border:1px solid #e5e7eb;
    border-radius:16px;
    padding:18px;
    margin-bottom:15px;
}

.header h2{
    margin:0;
    font-size:20px;
    font-weight:700;
    color:#111827;
}

.header p{
    margin:4px 0 0;
    font-size:13px;
    color:#6b7280;
}

/* ================= FILTER BAR ================= */
.filter-bar{
    display:flex;
    justify-content:space-between;
    gap:12px;
    flex-wrap:wrap;
    margin-bottom:15px;
}

/* SEARCH */
.search-box{
    flex:1;
    min-width:240px;
    display:flex;
    align-items:center;
    gap:10px;
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:12px;
    padding:10px 12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.03);
}

.search-box i{
    color:#9ca3af;
    font-size:14px;
}

.search-box input{
    border:none;
    outline:none;
    width:100%;
    font-size:14px;
}

/* FILTER */
.select-box{
    padding:10px 12px;
    border-radius:12px;
    border:1px solid #e5e7eb;
    background:#fff;
    font-size:14px;
    box-shadow:0 4px 12px rgba(0,0,0,0.03);
}

/* ================= TABLE ================= */
.card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:16px;
    overflow:hidden;
}

.card-header{
    display:flex;
    justify-content:space-between;
    padding:14px 18px;
    background:#fafafa;
    border-bottom:1px solid #e5e7eb;
    font-weight:600;
    font-size:14px;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#f9fafb;
}

th{
    text-align:left;
    font-size:13px;
    padding:12px;
    color:#374151;
}

td{
    padding:12px;
    font-size:13px;
    color:#111827;
    border-top:1px solid #f3f4f6;
}

/* ROW */
tbody tr:hover{
    background:#f9fafb;
}

/* ================= BADGES ================= */
.badge{
    padding:5px 10px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.green{background:#dcfce7;color:#166534;}
.red{background:#fee2e2;color:#b91c1c;}
.yellow{background:#fef3c7;color:#92400e;}
.blue{background:#dbeafe;color:#1e40af;}

/* BUTTON */
button{
    background:#2563eb;
    color:white;
    border:none;
    padding:7px 10px;
    border-radius:10px;
    font-size:12px;
    cursor:pointer;
    transition:0.2s;
}

button:hover{
    background:#1d4ed8;
}

/* SELECT */
select{
    padding:7px 10px;
    border-radius:10px;
    border:1px solid #e5e7eb;
    font-size:12px;
}

/* RESPONSIVE */
@media(max-width:768px){
    .filter-bar{
        flex-direction:column;
    }
}

</style>

<div class="wrapper">

    <!-- HEADER -->
    <div class="header">
        <h2>CEF Dashboard</h2>
        <p>Gestion des stagiaires, absences, retards et évaluations</p>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">

        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" id="searchInput" placeholder="Search Nom ou Prénom...">
        </div>

        <select class="select-box" id="filterSelect">
            <option value="all">All Evaluations</option>
            <option value="très bien">Très bien</option>
            <option value="bien">Bien</option>
            <option value="intermédiaire">Intermédiaire</option>
        </select>

    </div>

    <!-- TABLE -->
    <div class="card">

        <div class="card-header">
            <span>Liste des CEF</span>
            <span>Total: {{ count($cef) }}</span>
        </div>

        <div class="table-responsive">

            <table id="cefTable">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Absences</th>
                        <th>Retards</th>
                        <th>Sanction</th>
                        <th>Évaluation</th>
                        <th>Signature</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($cef as $s)
                <tr>

                    <td>#{{ $s->id }}</td>
                    <td>{{ $s->stagiaire->Nom }}</td>
                    <td>{{ $s->stagiaire->prénom }}</td>

                    <td><span class="badge red">{{ $s->stagiaire->absences->where('type','Absence')->count() }}</span></td>

                    <td><span class="badge yellow">{{ $s->stagiaire->absences->where('type','Retard')->count() }}</span></td>

                    <td>{{ $s->sanction }}</td>

                    <td class="eval">
                        @if($s->evaluation_final=='Très bien')
                            <span class="badge green">Très bien</span>
                        @elseif($s->evaluation_final=='Bien')
                            <span class="badge blue">Bien</span>
                        @else
                            <span class="badge yellow">Intermédiaire</span>
                        @endif
                    </td>

                    <td>
                        @if($s->signature=='Oui')
                            <span class="badge green">Oui</span>
                        @else
                            <span class="badge red">Non</span>
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('CEF.update',$s->id) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @method('PUT')

                            <select name="evaluation_final" required>
                                <option>Très bien</option>
                                <option>Bien</option>
                                <option>Intermédiaire</option>
                            </select>

                            <select name="signature" required>
                                <option>Oui</option>
                                <option>Non</option>
                            </select>

                            <button>Save</button>

                        </form>
                    </td>

                </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- FILTER JS -->
<script>

const searchInput = document.getElementById("searchInput");
const filterSelect = document.getElementById("filterSelect");
const table = document.getElementById("cefTable");

searchInput.addEventListener("input", function(){
    let value = this.value.toLowerCase();

    [...table.rows].forEach((row,i)=>{
        if(i===0) return;
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});

filterSelect.addEventListener("change", function(){
    let value = this.value.toLowerCase();

    [...table.rows].forEach((row,i)=>{
        if(i===0) return;

        let evalText = row.querySelector(".eval")?.innerText.toLowerCase() || "";

        row.style.display =
            value === "all" || evalText.includes(value) ? "" : "none";
    });
});

</script>

@endsection