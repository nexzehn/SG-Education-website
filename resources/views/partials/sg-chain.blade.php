{{--
  Process chain: Learn → Practise → Test → Analyse → Improve → (last step)
  @include('partials.sg-chain')                                  static
  @include('partials.sg-chain', ['live' => true])                steps light up in turn (6 steps)
  @include('partials.sg-chain', ['steps' => ['A', 'B', 'C']])    custom steps (static only)
  Last step gets the "repeat" icon unless 'endIcon' => null.
--}}
@php
    $steps = $steps ?? ['Learn', 'Practise', 'Test', 'Analyse', 'Improve', 'Repeat'];
    $live = ($live ?? false) && count($steps) === 6;
    $endIcon = array_key_exists('endIcon', get_defined_vars()) ? $endIcon : 'fas fa-redo-alt';
@endphp
<ol class="sg-chain {{ $live ? 'sg-chain--live' : '' }} wow fadeInUp" data-wow-duration="1500ms"
    aria-label="{{ implode(', ', $steps) }}">
    @foreach ($steps as $step)
        <li class="sg-chain__step {{ $loop->last ? 'sg-chain__step--end' : '' }}" style="--n: {{ $loop->index }};">
            @if ($loop->last && $endIcon)<i class="{{ $endIcon }}" aria-hidden="true"></i>@endif{{ $step }}
        </li>
        @unless ($loop->last)
            <li class="sg-chain__sep" aria-hidden="true"><i class="fas fa-chevron-right"></i></li>
        @endunless
    @endforeach
</ol>