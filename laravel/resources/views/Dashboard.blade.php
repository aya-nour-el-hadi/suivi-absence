@extends('layouts.app')

@section('content')

<script src="https://unpkg.com/lucide@latest"></script>

<style>
    
body{
   
    font-family: system-ui, -apple-system, Segoe UI, sans-serif;
    background:white;
    color:#0f172a;
}

.page{
    padding:25px;
}


.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header-left h1{
    margin:0;
    font-size:32px;
    font-weight:700;
    letter-spacing:-0.5px;
}

.header-left p{
    margin:6px 0 0;
    font-size:13px;
    color:#6b7280;
}


.header-badge{
    display:flex;
    align-items:center;
    gap:8px;
    padding:8px 12px;
    border-radius:999px;
    background:#ecfdf5;
    color:#10b981;
    font-size:12px;
    font-weight:600;
    border:1px solid #d1fae5;
}

.header-badge i{
    width:16px;
    height:16px;
}


.kpis{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:16px;
    margin-top:20px;
}

.kpi{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:20px;
    padding:18px;
    display:flex;
    gap:12px;
    align-items:center;
    transition:0.25s;
}

.kpi:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}


.icon-soft{
    width:48px;
    height:48px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 8px 18px rgba(0,0,0,0.05);
}


.icon-soft.blue{ background:#e8f1ff; color:#3b82f6; }
.icon-soft.red{ background:#ffe8ea; color:#ef4444; }
.icon-soft.yellow{ background:#fff6db; color:#f59e0b; }
.icon-soft.purple{ background:#f3e8ff; color:#7c3aed; }


.kpi span{
    font-size:12px;
    color:#6b7280;
}

.kpi h2{
    margin:4px 0 0;
    font-size:24px;
    font-weight:700;
}


.layout{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:20px;
    margin-top:30px;
}


.panel{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:20px;
    padding:20px;
}


.panel-head{
    display:flex;
    gap:10px;
    align-items:center;
}

.panel-head h3{
    margin:0;
    font-size:15px;
    font-weight:600;
}

.panel-head p{
    margin:2px 0 0;
    font-size:12px;
    color:#6b7280;
}


.list{
    margin-top:25px;
}

.item{
    display:grid;
    grid-template-columns:130px 1fr 60px;
    align-items:center;
    gap:12px;
    padding:12px 0;
}

.item span{
    font-size:13px;
    font-weight:500;
    color:#374151;
}


.track{
    height:8px;
    background:#e5e7eb;
    border-radius:999px;
    overflow:hidden;
}

.fill{
    height:100%;
    border-radius:999px;
}

.blue{ background:#93c5fd; }
.red{ background:#fca5a5; }
.yellow{ background:#fcd34d; }
.purple{ background:#c4b5fd; }

.item b{
    font-size:13px;
    font-weight:600;
    color:#111827;
}

.side{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.info-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:20px;
    padding:14px;
    display:flex;
    gap:12px;
    align-items:center;
    transition:0.2s;
}

.info-card:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.icon-box{
    width:48px;
    height:48px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
}

.icon-box.blue{ background:#e8f1ff; color:#3b82f6; }
.icon-box.red{ background:#ffe8ea; color:#ef4444; }
.icon-box.yellow{ background:#fff6db; color:#f59e0b; }
.icon-box.purple{ background:#f3e8ff; color:#7c3aed; }

/* TEXT */
.info-card h4{
    margin:0;
    font-size:13px;
    font-weight:600;
}

.info-card p{
    margin:2px 0 0;
    font-size:12px;
    color:#6b7280;
}


@media(max-width:900px){
    .kpis{
        grid-template-columns:repeat(2,1fr);
    }
    .layout{
        grid-template-columns:1fr;
    }

    .header{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
    }
}
</style>

<div class="page">

    {{-- HEADER --}}
    <div class="header">
        <div class="header-left">
            <h1>Absence Dashboard</h1>
            <p>Overview of attendance, delays and sanctions in real time</p>
        </div>

        <div class="header-badge">
            <i data-lucide="activity"></i>
            <span>Live System</span>
        </div>
    </div>

    {{-- KPI --}}
    <div class="kpis">

        <div class="kpi">
            <div class="icon-soft blue">
                <i data-lucide="users-2"></i>
            </div>
            <div>
                <span>Stagiaires</span>
                <h2>{{ $totalStagiaires }}</h2>
            </div>
        </div>

        <div class="kpi">
            <div class="icon-soft red">
                <i data-lucide="alert-triangle"></i>
            </div>
            <div>
                <span>Absences</span>
                <h2>{{ $totalAbsences }}</h2>
            </div>
        </div>

        <div class="kpi">
            <div class="icon-soft yellow">
                <i data-lucide="clock-3"></i>
            </div>
            <div>
                <span>Retards</span>
                <h2>{{ $totalRetards }}</h2>
            </div>
        </div>

        <div class="kpi">
            <div class="icon-soft purple">
                <i data-lucide="shield-check"></i>
            </div>
            <div>
                <span>Sanctions</span>
                <h2>{{ $totalSanctions }}</h2>
            </div>
        </div>

    </div>

    {{-- MAIN --}}
    <div class="layout">

{{-- LEFT --}}
<div class="panel">

    <div class="panel-head">
        <i data-lucide="sparkles"></i>
        <h3>Quick Insights</h3>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:18px;">

        <div style="padding:14px;border:1px solid #eef2f7;border-radius:14px;">
            <div style="font-size:12px;color:#64748b;">Absence Rate</div>
            <div style="font-size:20px;font-weight:800;color:#ef4444;">
                {{ $totalStagiaires > 0 ? round(($totalAbsences/$totalStagiaires)*100,1) : 0 }}%
            </div>
        </div>

        <div style="padding:14px;border:1px solid #eef2f7;border-radius:14px;">
            <div style="font-size:12px;color:#64748b;">Delay Rate</div>
            <div style="font-size:20px;font-weight:800;color:#f59e0b;">
                {{ $totalStagiaires > 0 ? round(($totalRetards/$totalStagiaires)*100,1) : 0 }}%
            </div>
        </div>

        <div style="padding:14px;border:1px solid #eef2f7;border-radius:14px;">
            <div style="font-size:12px;color:#64748b;">Discipline Score</div>
            <div style="font-size:20px;font-weight:800;color:#3b82f6;">
                {{ 100 - (($totalAbsences + $totalRetards) / max($totalStagiaires,1) * 10) }}%
            </div>
        </div>

        <div style="padding:14px;border:1px solid #eef2f7;border-radius:14px;">
            <div style="font-size:12px;color:#64748b;">Total Events</div>
            <div style="font-size:20px;font-weight:800;color:#7c3aed;">
                {{ $totalAbsences + $totalRetards + $totalSanctions }}
            </div>
        </div>

    </div>

</div>

        {{-- RIGHT --}}
        <div class="side">

            <div class="info-card">
                <div class="icon-box blue">
                    <i data-lucide="activity"></i>
                </div>
                <div>
                    <h4>System Status</h4>
                    <p>All systems running smoothly</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box red">
                    <i data-lucide="alert-circle"></i>
                </div>
                <div>
                    <h4>Absence Alerts</h4>
                    <p>{{ $totalAbsences }} cases recorded</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box yellow">
                    <i data-lucide="clock"></i>
                </div>
                <div>
                    <h4>Delay Records</h4>
                    <p>{{ $totalRetards }} late entries</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box purple">
                    <i data-lucide="layers"></i>
                </div>
                <div>
                    <h4>Total Activity</h4>
                    <p>{{ $totalAbsences + $totalRetards + $totalSanctions }} events tracked</p>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    lucide.createIcons();
</script>

@endsection