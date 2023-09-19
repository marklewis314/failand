<h2 class="text-xl mb-2">Recycle Dates</h2>

<ul>
@foreach (App\Classes\BinDay::upcoming() as $binday)
<li @if($binday->date->isPast())class="opacity-25"@endif>{{ $binday->date->format('l j F') }} - @if($binday->type == 'black') Black Bin @else <span class="text-lime-700">Green Bin</span> @endif</li>
@endforeach
</ul>
