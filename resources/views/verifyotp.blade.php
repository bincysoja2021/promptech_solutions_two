<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style type="text/css">
        .form_container{
          display: flex;
          align-items: center;
          justify-content: center;
          height: 100vh;
          flex-direction: column;
        }
        .form_container form{
          width: 50%;
        }
      </style>



    </head>
    <body class="antialiased">

      <div class="container form_container">
        <div id="liveAlertPlaceholder"></div>

          <form action="" id="verifyotp_Form"  method="POST">
            @csrf
                <h2>Verify OTP form</h2>
                

                <div class="row gap-3">
                  <div class="col-md-12">

                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter the email" name="email">
                    </div>
                  </div>
                  <div class="col-md-12">

                    <div class="form-group">
                      <label for="email">OTP</label>
                      <input type="text" class="form-control" id="otp" placeholder="Enter the otp" name="otp">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="verifyotp_FormBtn">Submit</button>
                  </div>
                </div>
            <!--  row   -->
            
          </form>
    </div> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script type="text/javascript">
           $('#verifyotp_Form').on('submit', function(e)
            {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var email = $('#email').val();
                var otp = $('#otp').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                url: "http://127.0.0.1:8000/api/auth/verifyotp",
                type:'POST',
                data: {_token:_token, email:email,otp:otp},
                success: function(res) {
                  const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                  const appendAlert = (message, type) => {
                    const wrapper = document.createElement('div')
                    wrapper.innerHTML = [
                      `<div class="alert alert-${type == 'error' ? 'danger' : type} alert-dismissible" role="alert">`,
                      `   <div>${message}</div>`,
                      '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                      '</div>'
                    ].join('')

                    alertPlaceholder.append(wrapper)
                  }
                  appendAlert(res.message,res.success)
                  if(res.success=="success")
                  {
                    setTimeout(()=>{
                      window.location.href="login";
                    },3000)
                  }
                }
                });
            });


        </script>
    </body>
</html>
