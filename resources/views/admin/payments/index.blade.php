@extends('layouts.master')

@section('title','Admin | Manage Payments')


@section('content')

<div class="row mb-1">
    <div class="col-sm-6" id="alert-div">
      @if (session('status'))
      <div class="alert disabled" style="background-color: rgb(198, 253, 216)" role="alert">
          {{ session('status') }}
      </div>
      @endif
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="float-sm-right" type="none">
        <li class=""> 
        <button type="button" class="btn bg-flex text-light btn-sm mb-2" data-toggle="modal" onclick="createPledge()">
            <i class="fa fa-plus"></i>
            Register Payment
        </button>   

            {{-- end of create purpose button --}}

        {{-- start register purpose modal --}}
        @include('admin.payments.register-payment-modal')
        {{-- end of register purpose modal --}}

        {{-- start of ajax register purpose method --}}
        @include('admin.payments.ajax-register-payment')
        {{-- end of ajax register purpose method --}}

        {{-- start of ajax update purpose method --}}
        {{-- @include('admin.purposes.ajax-update-purpose') --}}
        {{-- end of ajax update purpose method --}}

        {{-- start of ajax delete purpose method --}}
        {{-- @include('admin.purposes.ajax-delete-purpose') --}}
        {{-- end of ajax delete purpose method --}}
        <button type="button" class="btn bg-flex text-light btn-sm mb-2" data-toggle="modal" onclick="showAllMethods()">
            <i class="fa fa-list"></i>
             Payment Methods
        </button>
        <button type="button" class="btn bg-flex text-light btn-sm mb-2" data-toggle="modal" onclick="createMethod()">
        <i class="fa fa-plus"></i>
         Add Payment Method
        </button>
    </li>
       
      </ol>
      
    </div>
  </div>

<div class="card mt-1">

        <div class="responsiveness p-1">
            <table id="example1" class="table table-bordered cell-border responsive">
                <thead>
                     <tr class="text-secondary">
                        <th>ID</th>
                        <th>Payer Name</th>
                        <th>Payment Method</th>
                        <th>Purpose</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="payments-table-body">
          
  
                </tbody>
            </table>


             
             {{-- start of ajax fetch all pledges method --}}
             @include('admin.payments.ajax-fetch-all-payments')
             {{-- end of ajax fetch all pleges method --}}
     
             {{-- start of ajax view pledge details method --}}
             {{-- @include('admin.pledges.ajax-fetch-pledge-details') --}}
             {{-- end of ajax view purpose details method --}}
     
             {{-- start of ajax view purpose details modal --}}
             {{-- @include('admin.pledges.single-pledge-modal') --}}
             {{-- end of ajax view purpose details modal --}}
    </div>
</div>


{{-- Add Payment Type modal --}}

<div class="modal fade" id="method-modal">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-light">
           <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
              <input type="hidden" name="update_id" id="update_id">
                <div class="row mb-3">
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="text-secondary">Payment Method</label>
                        <input type="text" id="name" name="name" id="title" class="form-control" placeholder="Enter Payment Method Name">
                    </div>
                 </div>
                 <div class="col-md-6"></div>
                 <div class="col-md-6">
                    <div class="form-group">
                     
                        <button type="submit" class="btn bg-navy btn-block" id="save-method-btn">
                            <i class="fa fa-save"></i>
                            Save Payment Method
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

{{-- All Pledge Types Modal --}}

<div class="modal fade" id="types">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
         <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <div class="col-sm-12" id="alert-div">
        </div>
        <div class="row">
        {{-- start of ajax fetch all pledges method --}}

          <table   class="table table-bordered ">
              <thead>
                  <tr class="text-secondary">
                      <th>ID</th>
                      <th>Method Name</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody id="methods-table-body">

              </tbody>
          </table>


         
      </div>
      </div>
      <div class="modal-footer justify-content-between">
        {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      --}}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



  {{-- view payment modal --}}

  <div class="modal fade" id="view-modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-light">
           <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            <b class="text-secondary">Payer's Fullname:</b>   <span id="fname-info" class="text-dark"></span> <span id="mname-info" class="text-dark"></span> <span id="lname-info" class="text-dark"></span>
            <hr>
            <b class="text-secondary">Payment Purpose:</b>   <span id="purpose-info" class="text-dark"></span>
            <hr>
            <b class="text-secondary">Payment Amount:</b>   <span id="amount-info" class="text-dark"></span>
            <hr>
            <b class="text-secondary">Payment Method:</b>   <span id="method-info" class="text-dark"></span>
            <hr>
            <b class="text-secondary">Payment Date:</b>   <span id="date-info" class="text-dark"></span>
            <hr>
        </p>       
       
        </div>
        <div class="modal-footer justify-content-between">
          {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  {{-- start auto populate member pledges --}}

         <!-- Script -->
         <script type='text/javascript'>

          $(document).ready(function(){

            // Department Change
            $('#user_id').change(function(){

                // Department id
                var id = $(this).val();

                // Empty the dropdown
                $('#pledge_id').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                  url: 'getEmployees/'+id,
                  type: 'get',
                  dataType: 'json',
                  success: function(response){

                    var len = 0;
                    if(response['data'] != null){
                      len = response['data'].length;
                    }

                    if(len > 0){
                      // Read data and create <option >
                      for(var i=0; i<len; i++){

                        var id = response['data'][i].id;
                        var name = response['data'][i].name;

                        var option = "<option value='"+id+"'>"+name+"</option>"; 

                        $("#pledge_id").append(option); 
                      }
                    }

                  }
              });
            });

          });

          </script>
         
  {{-- end of auto populate member pledges --}}
   <script type="text/javascript">
  
         

    //         showAllMethods();


            /*
                This function will get all the payments records
            */
            function showAllMethods()
            {
                let url = $('meta[name=app-url]').attr("content") + "/admin/methods";
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        $("#methods-table-body").html("");
                        let methods = response.methods;
                        for (var i = 0; i < methods.length; i++) 
                        {
                          
                            let editBtn =  '<button ' +
                                ' class="btn btn-sm bg-navy" ' +
                                ' onclick="editMethod(' + methods[i].id + ')"><i class="fa fa-edit"></i>' +
                            '</button> ';
                            let deleteBtn =  '<button ' +
                                ' class="btn btn-danger btn-sm" ' +
                                ' onclick="destroyMethod(' + methods[i].id + ')"><i class="fa fa-trash"></i>' +
                            '</button>';
         
                            let projectRow = '<tr>' +
                                '<td>' + methods[i].id + '</td>' +
                                '<td>' + methods[i].name + '</td>' +
                                '<td>' + editBtn + deleteBtn + '</td>' +
                            '</tr>';
                            $("#methods-table-body").append(projectRow);
                            $("#types").modal('show'); 
                        }
         
                         
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }
         
          

            /*
                check if form submitted is for creating or updating
            */
            $("#save-method-btn").click(function(event ){
                event.preventDefault();
                if($("#update_id").val() == null || $("#update_id").val() == "")
                {
                    storeMethod();
                } else {
                    updateMethod();
                }
            })
            

      /*
                show modal for creating a record and 
                empty the values of form and remove existing alerts
            */
            function createMethod()
            {
                $("#alert-div").html("");
                $("#error-div").html("");   
                $("#update_id").val("");
                $("#name").val("");
                $("#method-modal").modal('show'); 
            }
         
            /*
                submit the form and will be stored to the database
            */
            function storeMethod()
            {   
                $("#save-method-btn").prop('disabled', true);
                let url = $('meta[name=app-url]').attr("content") + "/admin/methods";
                let data = {
                    name: $("#name").val(),
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "POST",
                    data: data,
                    success: function(response) {
                        $("#save-method-btn").prop('disabled', false);
                        let successHtml = '<div class="alert alert-success" role="alert">Payment Method Was Added Successfully</div>';
                        $("#alert-div").html(successHtml);
                        $("#name").val("");
                        showAllPledges();
                        $("#method-modal").modal('hide');
                    },
                    error: function(response) {
                        $("#save-method-btn").prop('disabled', false);
         
                        /*
            show validation error
                        */
                        if (typeof response.responseJSON.errors !== 'undefined') 
                        {
            let errors = response.responseJSON.errors;
            if (typeof errors.name !== 'undefined') 
                            {
                                nameValidation = '<li>' + errors.name[0] + '</li>';
                            }
             
            let errorHtml = '<div class="alert alert-danger" role="alert">' +
                '<b>Validation Error!</b>' +
                '<ul>' + nameValidation + '</ul>' +
            '</div>';
            $("#error-div").html(errorHtml);        
        }
                    }
                });
            }
         
         
         
            /*
                edit record function
                it will get the existing value and show the Payments form
            */
            function editPledge(id)
            {
                let url = $('meta[name=app-url]').attr("content") + "/admin/payments/" + id ;
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        let purpose = response.purpose;
                        $("#alert-div").html("");
                        $("#error-div").html("");   
                        $("#update_id").val(purpose.id);
                        $("#pledge_id").val(purpose.pledge_id);
                        $("#amount").val(purpose.amount);
                        $("#user_id").val(purpose.user_id);
                        $("#type_id").val(purpose.type_id);
                        $("#form-modal").modal('show'); 
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }
         
            /*
                sumbit the form and will update a record
            */
            function updatePledge()
            {
                $("#save-pledge-btn").prop('disabled', true);
                let url = $('meta[name=app-url]').attr("content") + "/admin/payments/" + $("#update_id").val();
                let data = {
                    pledge_id: $("#pledge_id").val(),
                    amount: $("#amount").val(),
                    user_id: $("#user_id").val(),
                    type_id: $("#type_id").val(),
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "PUT",
                    data: data,
                    success: function(response) {
                        $("#save-pledge-btn").prop('disabled', false);
                        let successHtml = '<div class="alert alert-success" role="alert">Payment Was Updated Successfully !</div>';
                        $("#alert-div").html(successHtml);
                        $("#pledge_id").val("");
                        $("#type_id").val("");
                        $("#user_id").val("");
                        $("#amount").val(""); 
                        showAllPledges();
                        $("#form-modal").modal('hide');
                    },
                    error: function(response) {
                        /*
            show validation error
                        */
                        $("#save-pledge-btn").prop('disabled', false);
                        if (typeof response.responseJSON.errors !== 'undefined') 
                        {
                            console.log(response)
            let errors = response.responseJSON.errors;
            let descriptionValidation = "";
            if (typeof errors.description !== 'undefined') 
                            {
                                descriptionValidation = '<li>' + errors.description[0] + '</li>';
                            }
            let nameValidation = "";
            if (typeof errors.name !== 'undefined') 
                            {
                                nameValidation = '<li>' + errors.name[0] + '</li>';
                            }
            let deadlineValidation = "";
            if (typeof errors.deadline !== 'undefined') 
                            {
                                deadlineValidation = '<li>' + errors.deadline[0] + '</li>';
                            }
              
            let amountValidation = "";
            if (typeof errors.amount !== 'undefined') 
                            {
                                amountValidation = '<li>' + errors.amount[0] + '</li>';
                            }
             
            let errorHtml = '<div class="alert alert-danger" role="alert">' +
                '<b>Validation Error!</b>' +
                '<ul>' + nameValidation + descriptionValidation + deadlineValidation + amountValidation +'</ul>' +
            '</div>';
            $("#error-div").html(errorHtml);        
        }
                    }
                });
            }
         

      /*
                edit record function
                it will get the existing value and show the payment form form
            */
            function editMethod(id)
            {
                let url = $('meta[name=app-url]').attr("content") + "/admin/methods/" + id ;
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        let method = response.method;
                        $("#alert-div").html("");
                        $("#error-div").html("");   
                        $("#update_id").val(method.id);
                        $("#name").val(method.name);
                        $("#types").modal('hide');
                        $("#method-modal").modal('show'); 
                       
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }
         
            /*
                sumbit the form and will update a record
            */
            function updateMethod()
            {
                $("#save-method-btn").prop('disabled', true);
                let url = $('meta[name=app-url]').attr("content") + "/admin/methods/" + $("#update_id").val();
                let data = {
                    name: $("#name").val(),
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "PUT",
                    data: data,
                    success: function(response) {
                        $("#save-pledge-btn").prop('disabled', false);
                        let successHtml = '<div class="alert alert-success" role="alert">Payment Method Was Updated Successfully !</div>';
                        $("#alert-div").html(successHtml);
                        $("#name").val("");
                        showAllMethods();
                        $("#method-modal").modal('hide');
                    },
                    error: function(response) {
                        /*
            show validation error
                        */
                        $("#save-pledge-btn").prop('disabled', false);
                        if (typeof response.responseJSON.errors !== 'undefined') 
                        {
                            console.log(response)
            let errors = response.responseJSON.errors;
            let nameValidation = "";
            if (typeof errors.name !== 'undefined') 
                            {
                                nameValidation = '<li>' + errors.name[0] + '</li>';
                            }
            let errorHtml = '<div class="alert alert-danger" role="alert">' +
                '<b>Validation Error!</b>' +
                '<ul>' + nameValidation + '</ul>' +
            '</div>';
            $("#error-div").html(errorHtml);        
        }
                    }
                });
            }
         
            /*
                get and display the record info on modal
            */
            function showPledge(id)
            {
                $("#name-info").html("");
                $("#description-info").html("");
                let url = $('meta[name=app-url]').attr("content") + "/admin/payments/" + id +"";
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        let purpose = response.purpose;
                        $("#fname-info").html(purpose.payer.fname);
                        $("#mname-info").html(purpose.payer.mname);
                        $("#lname-info").html(purpose.payer.lname);
                        $("#purpose-info").html(purpose.pledge.name);
                        $("#amount-info").html(purpose.amount);
                        $("#method-info").html(purpose.payment.name);
                        $("#date-info").html(purpose.   created_at);
                        $("#view-modal").modal('show'); 
         
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }
         
            /*
                delete record function
            */
            function destroyPledge(id)
            {
                let url = $('meta[name=app-url]').attr("content") + "/admin/payments/" + id;
                let data = {
                    pledge_id: $("#pledge_id").val(),
                    amount: $("#amount").val(),
                    user_id: $("#user_id").val(),
                    type_id: $("#type_id").val(),
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "DELETE",
                    data: data,
                    success: function(response) {
                        let successHtml = '<div class="alert alert-success" role="alert">Payment Was Deleted Successfully </div>';
                        $("#alert-div").html(successHtml);
                        showAllPledges();
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }


            /*
                delete payment record function
            */
            function destroyMethod(id)
            {
                let url = $('meta[name=app-url]').attr("content") + "/admin/methods/" + id;
                let data = {
                    name: $("#name").val(),
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "DELETE",
                    data: data,
                    success: function(response) {
                        let successHtml = '<div class="alert alert-danger" role="alert">Payment Method Was Deleted Successfully </div>';
                        $("#alert-div").html(successHtml);
    //                     showAllMethods();
    
                        $("#types").modal('hide'); 
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }
         
         
  </script>
@endsection