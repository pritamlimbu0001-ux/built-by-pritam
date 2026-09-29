<!DOCTYPE html>
<html lang="en">
<body style="font-family: Arial, sans-serif; color: #1f2937; line-height: 1.6;">
    <h2 style="color: #16a34a;">New message from your portfolio</h2>
    <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    @if ($contactMessage->subject)
        <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
    @endif
    <p><strong>Message:</strong></p>
    <p style="white-space: pre-wrap; background: #f3f4f6; padding: 12px; border-radius: 8px;">{{ $contactMessage->message }}</p>
</body>
</html>
