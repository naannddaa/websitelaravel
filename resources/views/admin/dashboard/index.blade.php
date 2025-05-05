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

 <!-- Statistik dan Cards -->
<div class="row">
  <!-- Diagram -->
  <div class="col-md-4 grid-margin stretch-card">
      <div class="card" style="padding: 10px;">
          <div class="card-body">
              <h5 class="card-title" style="font-size: 16px;">Statistik Penduduk</h5>
              <p class="card-description" style="font-size: 13px;">Pria dan Wanita</p>
              <canvas id="genderChart" style="height:180px;"></canvas>
              <div class="mt-2">
                  <span class="badge badge-primary">Pria</span>
                  <span class="badge badge-danger">Wanita</span>
              </div>
          </div>
      </div>
  </div>

  <!-- Card Jumlah -->
  <div class="col-md-8">
      <div class="row">
          <div class="col-md-6 mb-3">
              <!-- Jumlah Penduduk -->
              <div class="card shadow-sm rounded p-3 text-center">
                  <div class="mb-2">
                      <div style="width: 40px; height: 40px; background: #e6e9ff; border-radius: 50%; margin: 0 auto;">
                          <i class="mdi mdi-account-group" style="font-size: 24px; line-height: 40px; color: #4b49ac;"></i>
                      </div>
                  </div>
                  <h4 class="font-weight-bold mb-0">1,200</h4>
                  <small class="text-muted">Jumlah Penduduk</small>
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <!-- Jumlah KK -->
              <div class="card shadow-sm rounded p-3 text-center">
                  <div class="mb-2">
                      <div style="width: 40px; height: 40px; background: #e6e9ff; border-radius: 50%; margin: 0 auto;">
                          <i class="mdi mdi-card-account-details" style="font-size: 24px; line-height: 40px; color: #4b49ac;"></i>
                      </div>
                  </div>
                  <h4 class="font-weight-bold mb-0">350</h4>
                  <small class="text-muted">Jumlah KK</small>
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <!-- Penduduk Wanita -->
              <div class="card shadow-sm rounded p-3 text-center">
                  <div class="mb-2">
                      <div style="width: 40px; height: 40px; background: #e6e9ff; border-radius: 50%; margin: 0 auto;">
                          <i class="mdi mdi-gender-female" style="font-size: 24px; line-height: 40px; color: #f06292;"></i>
                      </div>
                  </div>
                  <h4 class="font-weight-bold mb-0">620</h4>
                  <small class="text-muted">Penduduk Wanita</small>
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <!-- Penduduk Pria -->
              <div class="card shadow-sm rounded p-3 text-center">
                  <div class="mb-2">
                      <div style="width: 40px; height: 40px; background: #e6e9ff; border-radius: 50%; margin: 0 auto;">
                          <i class="mdi mdi-gender-male" style="font-size: 24px; line-height: 40px; color: #42a5f5;"></i>
                      </div>
                  </div>
                  <h4 class="font-weight-bold mb-0">580</h4>
                  <small class="text-muted">Penduduk Pria</small>
              </div>
          </div>
      </div>
  </div>
</div>

</div>

<!-- Library Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<!-- Script Gender Chart -->
<script>
    const ctx = document.getElementById('genderChart').getContext('2d');
    const genderChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pria', 'Wanita'],
            datasets: [{
                data: [580,620], // Ubah sesuai data
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

@endsection