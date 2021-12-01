@component('mail::message')
# Alert from PCST !


<div>
    Hi {{ $firstName }}, this mail has been sent to you to confirm you that the modifications on your account has been saved !
</div>
@component('mail::button', ['url' => 'http://wiki.pcst.xyz'])
Come and explore !
@endcomponent

Thanks,<br>
PCST Support
@endcomponent
