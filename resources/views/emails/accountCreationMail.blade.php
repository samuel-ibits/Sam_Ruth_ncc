<!DOCTYPE html>
<html>
<head>
    <title>Account Creation!</title>
</head>
<body>
    <h1>Account Creation!</h1>
    <p>Welcome to National Tower!</p>
    <p>An account has been created for you on <a href="nationaltowerpotal.com.ng">nationaltowerpotal.com.ng<a> below is your credential</p>
    <p>Email {{ $details['email'] }}</p>
    <p>To start using the portal, <a href="{{ $details['url'] }}">click here</a> or copy the link <a href="{{ $details['url'] }}">{{ $details['url'] }}</a> </p>
    <p>Thank you</p>
</body>
</html>
