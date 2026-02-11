<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Organization Activated</title>
</head>

<body style="font-family:Arial;background:#f3f4f6;padding:30px">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

<table width="560" style="background:#fff;padding:30px;border-radius:14px">

<tr>
<td align="center">
<img src="{{ asset('/logo.webp') }}" width="170">
</td>
</tr>

<tr>
<td>

<h2>Hello {{ $user->name }}</h2>

<p>
Your organization <strong>{{ $user->organization->name }}</strong>
has now been activated and you can start using the platform.
</p>

<p>
Login to begin managing loans, users and operations.
</p>

<p style="margin-top:30px;text-align:center">
<a href="{{ url('/login') }}"
style="background:#dc2626;color:#fff;padding:12px 26px;border-radius:8px;text-decoration:none">
Login Now
</a>
</p>

</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
