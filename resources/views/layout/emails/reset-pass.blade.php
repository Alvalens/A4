{{-- click link with $token --}}
<h1>Reset Password akun <span>{{ $nama }}</span></h1>
<p>tekan link dibawah ini untuk melanjutkan</p>
<a href="{{ url('lupa-password/reset-password/'. $token. '/' . $nama ) }}">Reset Password</a>
