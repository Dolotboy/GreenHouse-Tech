@component('mail::message')
# Welcome on pcst !


<div>
    Hi {{ $firstName }}, your account has been created !
</div>
@component('mail::button', ['url' => 'http://wiki.pcst.xyz'])
Come and explore !
@endcomponent

Thanks,<br>
PCST Support
@endcomponent
