<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 
    <title>Medical Center Management</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
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
<body style="width: 100%; height: 100%; margin-top: 0px; opacity: 90%; background: url('../images/menu/fondoMC.png') no-repeat center;">
<div class="container login-container" >
            <div class="row">
                <div class="col-md-3">
                </div>   
                <div class="col-md-6 login-form-2">
                    <h3>Medical Center Login</h3>
                    <form action="{{url('accestrue')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="User Name" value="" name='user'/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter password" value="" name='password'/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                        </div>
                    </form>
                    <form action="{{url('changepassword')}}" method="post">
                        @csrf
                        <div style="width: 80%; float: center;">
                            <input type="submit" class="btnSubmit" value="Change Password" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>