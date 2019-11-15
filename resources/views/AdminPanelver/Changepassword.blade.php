<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

</style>

<?php 
if (!isset($error)) {$error='';}
?>

<div class="container login-container">
            <div class="row">
                <div class="col-md-3">
                </div>   
                <div class="col-md-6 login-form-2">
                    <h3>Change password</h3>
                    <h5 style="color: red;">{{$error}}</h5>
                    <form action="{{url('dochangepassword')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your User *" value="" name='user'/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Current password *" value="" name='current' required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New password *" value="" name='password' required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Repeat Password *" value="" name='rnew' required />
                        </div>
                        <div>
                            <input type="submit" class="btnSubmit" value="Save" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

<script type="text/javascript">
    
    var password, password2;

password = document.getElementById('new');
password2 = document.getElementById('rnew');

password.onchange = password2.onkeyup = passwordMatch;

function passwordMatch() {
    if(password.value !== password2.value)
        password2.setCustomValidity('Las contraseñas no coinciden.');
    else
        password2.setCustomValidity('');
}

</script>