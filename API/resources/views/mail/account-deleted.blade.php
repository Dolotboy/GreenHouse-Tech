@component('mail::message')
# Alert from PCST !


<div>
    Hi {{ $firstName }}, this mail has been sent to confirm you that your account as has been deleted, we regret your departure and we hope you will come back soon !
</div>
@component('mail::button', ['url' => 'http://wiki.pcst.xyz'])
Come and explore !
@endcomponent

Thanks,<br>
PCST Support
@endcomponent