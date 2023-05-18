<!-- Example of how to use the verification URL in the email view -->
<p>Tolong klik link di bawah ini untuk verifikasi email</p>
<p>email anda: {{  $email }}</p>
<a href="{{ $verificationUrl }}/{{ $email }}">Verifikasi Email</a>
