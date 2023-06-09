<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profile_User</title>
    <style>
        .password{
            display: none;
        }
    </style>
</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <!-- <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div> -->
        <div class="col-md-5 border-right mx-auto">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                @csrf
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" value="{{$user->name}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="{{$user->email}}"></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="Viet Nam"></div>
                </div>
                <div class="row mt-3 password " >
                    <div class="col-md-12">
                        <label class="labels">Country</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-around">
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>
                    <button class="btn btn-primary change-password" type="button">Change Password</button>
                    <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                    
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    const btn_changePass = document.querySelector('.change-password');
    const pass = document.querySelector('.password');
    btn_changePass.addEventListener('click', function(){
        pass.classList.toggle("password");
    });
</script>
</body>
</html>