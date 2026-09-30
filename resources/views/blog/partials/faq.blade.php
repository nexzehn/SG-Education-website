{{-- @include('blog.partials.faq', ['faqs' => $post['faqs']]) — FAQPage schema is emitted by blog/show --}}
@if (!empty($faqs))
    <h2 id="faq">Frequently asked questions</h2>
    <div class="sg-faq">
        @foreach ($faqs as $faq)
            <details @if ($loop->first) open @endif>
                <summary>{{ $faq['q'] }}</summary>
                <p>{{ $faq['a'] }}</p>
            </details>
        @endforeach
    </div>
@endif
