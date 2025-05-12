@extends('admin.layout.main')
@section('title', 'Dashboard')
@section('konten')
<link href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">

<div class="container-scroller">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Selamat Datang Admin Desa Kalipait</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex">
        <!-- PIE CHART -->
        <div class="col-md-4 d-flex">
            <div class="card w-100" style="padding: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Statistik Penduduk</h5>
                    <p class="card-description">Pria dan Wanita</p>
                    <canvas id="genderChart" style="height:200px;"></canvas>
                    <div class="mt-3">
                        <span class="badge bg-primary">Pria</span>
                        <span class="badge bg-danger">Wanita</span>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- 6 CARD -->
        <div class="col-md-8 d-flex flex-wrap">
            <!-- Card Item -->
            <div class="col-md-6 mb-3 d-flex align-items-stretch">
                <div class="card w-100 text-center p-3">
                    <div class="mb-2">
                        <i class="mdi mdi-account-group" style="font-size: 24px; color: #4b49ac;"></i>
                    </div>
                    <h4 class="fw-bold mb-0">1,200</h4>
                    <small class="text-muted">Jumlah Penduduk</small>
                </div>
            </div>
    
            <div class="col-md-6 mb-3 d-flex align-items-stretch">
                <div class="card w-100 text-center p-3">
                    <div class="mb-2">
                        <i class="mdi mdi-card-account-details" style="font-size: 24px; color: #4b49ac;"></i>
                    </div>
                    <h4 class="fw-bold mb-0">350</h4>
                    <small class="text-muted">Jumlah KK</small>
                </div>
            </div>
    
            <div class="col-md-6 mb-3 d-flex align-items-stretch">
                <div class="card w-100 text-center p-3">
                    <div class="mb-2">
                        <i class="mdi mdi-gender-female" style="font-size: 24px; color: #e91e63;"></i>
                    </div>
                    <h4 class="fw-bold mb-0">620</h4>
                    <small class="text-muted">Penduduk Wanita</small>
                </div>
            </div>
    
            <div class="col-md-6 mb-3 d-flex align-items-stretch">
                <div class="card w-100 text-center p-3">
                    <div class="mb-2">
                        <i class="mdi mdi-gender-male" style="font-size: 24px; color: #2196f3;"></i>
                    </div>
                    <h4 class="fw-bold mb-0">580</h4>
                    <small class="text-muted">Penduduk Pria</small>
                </div>
            </div>
    
            <div class="col-md-6 mb-3 d-flex align-items-stretch">
                <div class="card w-100 text-center p-3">
                    <div class="mb-2">
                        <i class="mdi mdi-home-group" style="font-size: 24px; color: #00c292;"></i>
                    </div>
                    <h4 class="fw-bold mb-0">12</h4>
                    <small class="text-muted">Total RT</small>
                </div>
            </div>
    
            <div class="col-md-6 mb-3 d-flex align-items-stretch">
                <div class="card w-100 text-center p-3">
                    <div class="mb-2">
                        <i class="mdi mdi-home-group" style="font-size: 24px; color: #e74c3c;"></i>
                    </div>
                    <h4 class="fw-bold mb-0">8</h4>
                    <small class="text-muted">Total RW</small>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>

<!-- Library Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script Chart Gender -->
<script>
    const ctx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pria', 'Wanita'],
            datasets: [{
                data: [580, 620],
                backgroundColor: ['#36A2EB', '#FF6384'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        }
    });
</script>

<!-- Script Bawaan -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>

@endsection