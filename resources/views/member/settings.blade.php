@extends('layouts.member')

@section('title','My Settings')


@section('content')

<style>
        .active {
            color: green !important;
        }
</style>
<section class="content">
    
      <!-- Small boxes (Stat box) -->
      <div class="row">
    
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2 bg-white">
              <ul class="nav nav-tabs nav-light">
                <li class="nav-item">
                  <a class="nav-link text-navy active" href="#interface"  data-toggle="tab">Change Password</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link text-navy" href="#payments"  data-toggle="tab">Payments Report</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-navy" href="#announcements"  data-toggle="tab">Cards Payments Report</a>
                </li> --}}
              </ul>
            </div><!-- /.card-header -->
            <div class="">
              <div class="tab-content">
                <div class="active tab-pane" id="interface">
                  {{-- start of interface settings --}}
                  
                    <div class="col-md-8 mx-auto">
                      <div class="p-2">
                        
                          <div class="col-md-12">
                            @if (session('status'))
                            <div class="btn btn-danger disabled btn-block"  role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                               {{--displaying all the errors  --}}
                               @if ($errors->any())
                               <div class="alert alert-danger">
                                   @foreach ($errors->all() as $error)
                                       <div>{{$error}}</div>
                                   @endforeach
                               </div>
                               @endif
                              <form action="{{ url('member/change-password') }}" method="post"  enctype="multipart/form-data" >
                                  @csrf
                                  <div class="mb-3">
                                      <label for="" class="text-secondary">Current Password</label>
                                      <input name="current_password" placeholder="Enter Current Password" type="password" class="form-control">
                                  </div>
                                  <div class="mb-3">
                                    <label for="newPasswordInput" class="form-label text-secondary">New Password</label>
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                        placeholder="New Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirmNewPasswordInput" class="form-label text-secondary">Confirm New Password</label>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Confirm New Password">
                                </div>                              
                                   
                                <hr>
                                  <div class="row">
                                    
                                      <div class="col-md-9"></div>
                                      <div class="col-md-3">
                                          <button class="btn bg-flex text-light btn-block float-end" type="submit">
                                            <i class="fa fa-key"></i>
                                            Change Password
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  

                  {{-- end of interface settings --}}
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="audits">
               
         
                 
               
              
              
              </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="announcements">

               
                  {{-- start of report form --}}

                  <div class="col-md-12">
                    <div class="p-2">
                      
                        <div class="col-md-12">
                          @if (session('status'))
                          <div class="btn btn-danger disabled btn-block"  role="alert">
                              {{ session('status') }}
                          </div>
                          @endif
                             {{--displaying all the errors  --}}
                             @if ($errors->any())
                             <div class="alert alert-danger">
                                 @foreach ($errors->all() as $error)
                                     <div>{{$error}}</div>
                                 @endforeach
                             </div>
                             @endif
                            <form action="{{ url('member/report-problem') }}" method="post"  enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="text-secondary">Your Issue</label>
                                   <textarea name="problem" id="problem" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <br>
                                    <label for="" class="text-secondary">Attachment</label>
                                    <p>
                                        <small class="text-secondary">Upload Screenshots if you have any</small>
                                    </p>
                                    
                                    <input type="file" class="form-control">
                                </div>
                               
                              <hr>
                                <div class="row">
                                  
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3 ">
                                        <button class="btn bg-navy btn-block float-end" type="submit">
                                          <i class="fa fa-headset"></i>
                                           Report Issue
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                  {{-- end of report form --}}
               
              
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>       
      </div>
   
</section>
    
{{-- Register Member modal --}}
<div class="modal fade" id="registeredModal" tabindex="-1" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ url('admin/registered-members') }}" method="GET">
            @csrf
    
            <div class="mb-3">
            <h5 class="text-secondary">
                Generate Registered Member Report From the Given Start Date To the given End Date
            </h5>
            </div>
            <div class="mb-3">
              <label for="message-text" class="text-secondary">From Date:</label>
               <input type="date" class="form-control" id="from_date" name="from_date" placeholder="Enter Start Date">
            </div>
            <div class="mb-3">
              <label for="message-text" class="text-secondary">To Date:</label>
               <input type="date" class="form-control" id="to_date" name="to_date" placeholder="Enter End Date">
            </div>
            <div class="mb-3">
                <label for="message-text" class="text-secondary">Sort By:</label>
                <select name="sort_by" id="sort_by">
                    <option value="created_at">Registered Date</option>
                    <option value="fname">First Name</option>
                    <option value="date_of_birth">Birthdate</option>
                </select>
              </div>
            <div class="row">
              <div class="col-md-6">
  
              </div>
              <div class="mb-3 col-md-6">
                 <button type="submit" class="btn btn-primary btn-block " id="save-purpose-btn">
                  <i class="fa fa-download"></i>
                  Download Report
                </button>
              </div>
            </div>
  
       
          </form>
        </div>
      </div>
    </div>
  </div>
  


  


  @endsection