<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="{{ asset('front/assets/images/logo-sm.png')}}" class="logo" alt="{{ $slot }}">
{{-- @else
{{ $slot }}
@endif --}}
</a>
</td>
</tr>
