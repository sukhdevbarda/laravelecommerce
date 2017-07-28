 @extends('admin.layouts.app')
 @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Images</th>
                                  </tr>
                </thead>
                <tbody>
                @if(count($products))
                @foreach($products as $value)
                <tr>
                  <td>{{$value->name}}</td>
                  @if(count($value->ProductsImages)>0)
                  <td>
                  @foreach($value->ProductsImages as $image)
                  <img height="50" with="50" src="{{ asset('storage/app').'/'.$image->image}}">

                  @endforeach
                  </td>
                @endif
                <td><a href="{{url('admin/product/edit/'.$value->id)}}" >Edit</a></td>
                </tr>
                @endforeach
                @endif
                
                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>name</th>
                  <th>Images</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  @endsection