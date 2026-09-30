{{--
  Post cover. Uses $post['image'] if set, otherwise a typographic cover.
  @include('blog.partials.cover', ['post' => $post, 'size' => 'lg'|'sm'])
--}}
@php $size = $size ?? 'sm'; @endphp
<div class="sg-cover sg-cover--{{ $size }}" aria-hidden="true">
    @if (!empty($post['image']))
        <img src="{{ asset($post['image']) }}" alt="" width="1200" height="630" loading="lazy" decoding="async">
    @else
        <span class="sg-cover__word">{{ $post['category'] }}</span>
        <span class="sg-cover__grid"></span>
    @endif
</div>

@once
    <style>
        .sg-cover {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1200 / 630;
            background:
                radial-gradient(circle at 85% 20%, rgba(var(--eduhive-primary-rgb), .45) 0%, transparent 50%),
                #1e2833;
        }

        .sg-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sg-cover__word {
            position: absolute;
            left: 6%;
            bottom: -.14em;
            font-size: clamp(64px, 11vw, 150px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.05em;
            color: transparent;
            -webkit-text-stroke: 2px rgba(255, 255, 255, .55);
            white-space: nowrap;
        }

        .sg-cover--sm .sg-cover__word {
            font-size: clamp(56px, 7vw, 96px);
        }

        .sg-cover__grid {
            position: absolute;
            top: 0;
            right: 0;
            width: 45%;
            height: 100%;
            background-image: radial-gradient(circle, rgba(255, 255, 255, .16) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
            -webkit-mask-image: linear-gradient(90deg, transparent, #000);
            mask-image: linear-gradient(90deg, transparent, #000);
        }
    </style>
@endonce
