<!-- Example of how to use the verification URL in the email view -->
<p>Please click the following link to verify your email address:</p>
<p>your email: {{  $email }}</p>
<a href="{{ $verificationUrl }}/{{ $email }}">Verify Email</a>
