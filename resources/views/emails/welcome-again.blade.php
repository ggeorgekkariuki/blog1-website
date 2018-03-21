@component('mail::message')
# Introduction

The body of your message.

1. This is a textdomain

2. This is another text and another

3. Is this another text? I don't know.

4. Most importantly, this is a welcome again page for you

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
# Lorem ipsum and other Lores of Ip and Sum
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
