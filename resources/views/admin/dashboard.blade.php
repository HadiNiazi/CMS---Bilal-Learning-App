@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('css')
<link href="{{ asset('assets/admin/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="{{ asset('assets/admin/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content">
    <!-- Top Statistics -->
    <div class="row">
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{ $usersCount }}</h2>
            <div class="sub-title">
              <span class="mr-1">Total Users</span>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>$14,500</h2>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <div class="sub-title">
              <span class="mr-1">Expense of this year</span> |
              <span class="mx-1">50%</span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>$4199</h2>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <div class="sub-title">
              <span class="mr-1">Profit of this year</span> |
              <span class="mx-1">20%</span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-3"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>$20,199</h2>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
            <div class="sub-title">
              <span class="mr-1">Revenue of this year</span> |
              <span class="mx-1">35%</span>
              <i class="mdi mdi-arrow-up-bold text-success"></i>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-4"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  <div class="row">
    <div class="col-xl-8">

      <!-- Income and Express -->
      <div class="card card-default">
        <div class="card-header">
          <h2>Income And Expenses</h2>
          <div class="dropdown">
            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" data-display="static">
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="chart-wrapper">
            <div id="mixed-chart-1"></div>
          </div>
        </div>

      </div>


    </div>
    <div class="col-xl-4">
      <!-- Current Users  -->
      <div class="card card-default">
        <div class="card-header">
          <h2>Current Users</h2>
          <span>Realtime</span>
        </div>
        <div class="card-body">
          <div id="barchartlg2"></div>
        </div>
        <div class="card-footer bg-white py-4">
          <a href="#" class="text-uppercase">Current Users Overview</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Table Product -->
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header">
          <h2>Products Inventory</h2>
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false"> Yearly Chart
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table id="productsTable" class="table table-hover table-product" style="width:100%">
            <thead>
              <tr>
                <th></th>
                <th>ID</th>
                <th>Qty</th>
                <th>Variants</th>
                <th>Committed</th>
                <th>Daily Sale</th>
                <th>Sold</th>
                <th>In Stock</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>Coach Swagger</td>
                <td>24541</td>
                <td>27</td>
                <td>1</td>
                <td>2</td>
                <td>
                  <div id="tbl-chart-01"></div>
                </td>
                <td>4</td>
                <td>18</td>
                <td>
                  <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </td>
              </tr>




            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>



</div>
@endsection


@section('scripts')
<script src="{{ asset('assets/admin/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
    jQuery(document).ready(function() {
    jQuery('input[name="dateRange"]').daterangepicker({
    autoUpdateInput: false,
    singleDatePicker: true,
    locale: {
        cancelLabel: 'Clear'
    }
    });
    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
    });
    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
        jQuery(this).val('');
    });
    });
</script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="{{ asset('assets/admin/plugins/toaster/toastr.min.js') }}"></script>
@endsection
