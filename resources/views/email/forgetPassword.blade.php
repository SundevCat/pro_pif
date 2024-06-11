<h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="{{ URL::to('reset.password.get/'.$token.'/'.$email) }}">Reset Password</a>

url to = {{ URL::to('reset.password.get/'.$token.'/'.$email) }}