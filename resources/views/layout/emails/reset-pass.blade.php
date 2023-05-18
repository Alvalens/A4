{{-- click link with $token --}}
<h1>Reset Password akun<span>{{ $nama }}</span></h1>
<a href="{{ url('reset-password/'. $token. '/' . $nama ) }}">Reset Password</a>
