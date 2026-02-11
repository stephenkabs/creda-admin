<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Invitation</title>
</head>

<body style="font-family:Arial;background:#f3f4f6;padding:30px">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

<table width="560" style="background:#ffffff;padding:34px;border-radius:14px">

<tr>
<td align="center" style="padding-bottom:18px;">
<h2 style="margin:0;color:#111;">You're Invited 🎉</h2>
</td>
</tr>

<tr>
<td style="font-size:15px;color:#374151;line-height:1.6">

<p>Hello <strong>{{ $user->name }}</strong>,</p>

<p>
You have been invited to join
<strong>{{ $organization->name }}</strong>

@if($user->branch)
in the <strong>{{ $user->branch->name }}</strong> branch
@endif

workspace. Click the button below to activate your account and begin using the system.
</p>


<p style="text-align:center;margin:34px 0;">
<a href="{{ $inviteLink }}"
   style="background:#a90101;color:white;padding:14px 28px;border-radius:10px;text-decoration:none;font-weight:600;">
   Accept Invitation
</a>
</p>

<p style="font-size:13px;color:#6b7280">
If you were not expecting this invitation, you may safely ignore this email.
</p>

</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
