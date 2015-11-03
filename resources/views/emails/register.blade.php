<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
</head>
<body>
	Hello {{ $name }} Terimakasih Telah Melakukan Pendaftaran! <br><br>
	<br><br>
	* Klick Link Di Bawah Ini Untuk Melakukan Verifykasi Akun Anda
	<br>
	<a href="{{ url('/registration/activate'. $code) }}">
	{{ url('/registration/activate/'. $code) }}</a>
	<br><br><br><br><br>

	<p>* : Jika Link Di Atas Tidak Bisa, Copy Link Lalu Paste Di Tab Baru Kemudian Enter</p>
	<br><br>
	<p style="color:red;">PT. Mandala Indonesia Technology.</p>
</body>
</html>