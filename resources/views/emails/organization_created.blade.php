<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Organization Activated</title>
</head>

<body style="margin:0;padding:0;background:#f3f4f6;
font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:30px;">
<tr>
<td align="center">

<table width="100%" cellpadding="0" cellspacing="0"
style="max-width:560px;background:#ffffff;border-radius:16px;
padding:36px;box-shadow:0 12px 40px rgba(0,0,0,.12);">

<tr>
<td align="center" style="padding-bottom:20px;">
<img src="{{ asset('/logo.webp') }}" width="170">
</td>
</tr>

<tr>
<td>

<h2 style="margin:0 0 10px 0;font-weight:700;color:#111827;">
Hello {{ $user->name }},
</h2>

<p style="color:#4b5563;font-size:14px;line-height:1.6;">
Your organization <strong>{{ $organization->name }}</strong>
has been successfully activated.
</p>

<p style="color:#4b5563;font-size:14px;line-height:1.6;">
You can now log in and start using the platform.
</p>

<div style="margin-top:28px;text-align:center;">
<a href="{{ url('/login') }}"
style="display:inline-block;padding:12px 28px;background:#dc2626;
color:#ffffff;border-radius:10px;font-weight:600;text-decoration:none;">
Login to Dashboard
</a>
</div>

<p style="margin-top:35px;font-size:12px;color:#9ca3af;text-align:center;">
Powered by <strong>Neurasoft Technologies</strong>
</p>

</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
