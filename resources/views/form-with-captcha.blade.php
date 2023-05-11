<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Form Captcha Validation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <h2>Laravel 10 Add Captcha in Form For Validation</h2>
        </div>
        <div class="card-body">
            <form name="captcha-contact-us" id="captcha-contact-us" method="post" action="{{url('captcha-validation')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Message</label>
                    <textarea name="message" class="@error('message') is-invalid @enderror form-control"></textarea>
                    @error('message')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4 mb-4">
                    <div class="captcha">
                        <span >{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            ↻
                        </button>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</body>
</html>
