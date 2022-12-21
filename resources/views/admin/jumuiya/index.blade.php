@extends('layouts.master')

@section('title','All Communities')


@section('content')


<div class="row mb-1">
    <div class="col-sm-6">
      @if (session('status'))
      <div class="alert disabled" style="background-color: rgb(198, 253, 216)" role="alert">
          {{ session('status') }}
      </div>
      @endif
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="">    

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
        <i class="fa fa-plus"></i>
         Add Community
        </button>
    </li>
       
      </ol>
      
    </div><!-- /.col -->
  </div>

<div class="card mt-1">
    <div class="card-header bg-light">
        <h6 class="text-light">
          {{-- All Communities --}}
        </h6>
    </div>
    <div class="card-body">




        <div class="row">
            <table id="datatablesSimple" class="table table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jumuiya Name</th>
                        <th>Abbreviation</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($communities as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->abbreviation }}</td>
                        <td>{{ $item->location }}</td>                        

                        <td>
                            <a href="{{ url('admin/view-community/'.$item->id)}}" class="btn btn-primary btn-sm mx-1">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="{{ url('admin/edit-community/'.$item->id)}}" class="btn btn-secondary btn-sm mx-1">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <a href="{{ url('admin/delete-community/'.$item->id)}}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>



    </div>
</div>


{{-- Add Community modal --}}

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h4 class="modal-title">Large Modal</h4> --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('admin/add-community') }}" method="post">
                @csrf
                <div class="row mb-3">
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="text-secondary">Community Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Community Name">
                    </div>
                 </div>
                 <div class="col-md-12">
                  <div class="form-group">
                      <label for="abbreviation" class="text-secondary">Abbreviation</label>
                      <input type="text" name="abbreviation" id="abbreviation" class="form-control" placeholder="Enter Abbreviation">
                  </div>
               </div>
               <div class="col-md-12">
                <div class="form-group">
                    <label for="location" class="text-secondary">Location</label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="Enter Location">
                </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                     
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            Save Community
                        </button>
                    </div>
                 </div>
                </div>
            </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection