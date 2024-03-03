@if (session('message'))
<x-alert icon="o-exclamation-triangle" class="alert-success">

    {{ session('message') }}

</x-alert>
@endif
@if (session('error'))
<x-alert icon="o-exclamation-triangle" class="alert-warning">

    {{ session('error') }}

</x-alert>
@endif
