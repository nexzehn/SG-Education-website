{{--
  Shared accordion (styles: sg-custom.css §13, behaviour: sg-custom.js)
  @include('partials.sg-accordion', ['items' => [['q' => '…', 'a' => '…'], …]])
  First item starts open. One item open at a time.
--}}
<div class="sg-faq-list wow fadeInUp" data-wow-duration="1500ms">
    @foreach ($items as $item)
        <div class="sg-faq-item {{ $loop->first ? 'is-open' : '' }}">
            <h3 class="sg-faq-item__h">
                <button type="button" class="sg-faq-btn" aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="sg-faq-num" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="sg-faq-q">{{ $item['q'] }}</span>
                    <span class="sg-faq-toggle" aria-hidden="true"><i class="fas fa-plus"></i></span>
                </button>
            </h3>
            <div class="sg-faq-panel">
                <div class="sg-faq-panel__inner">
                    <p class="sg-faq-a">{{ $item['a'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>