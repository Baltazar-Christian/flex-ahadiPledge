{{-- This is the page is for ajax purpose deletion method --}}

 <script type="text/javascript">       
/*
                delete record function
            */
            function destroyPayment(id)
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
                        showAllPayments();
                    },
                    error: function(response) {
                        console.log(response.responseJSON)
                    }
                });
            }
      </script>