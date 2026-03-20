@extends('layouts.app')

@section('title', $post->title . ' - The Mureed Blog')
@section('meta_description', $post->meta_description ?? $post->excerpt ?? Str::limit(strip_tags($post->content), 155))
@section('og_title', $post->title)
@section('og_description', $post->meta_description ?? $post->excerpt ?? Str::limit(strip_tags($post->content), 155))
@section('og_image', $post->featured_image ? asset('storage/' . $post->featured_image) : '')

@section('content')
<div class="page-header">
    <h1>{{ $post->title }}</h1>
    <p>By {{ $post->author }} &middot; {{ $post->published_at->format('F d, Y') }}</p>
</div>

<article class="content-section blog-article">
    @if($post->featured_image)
    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="blog-featured-image" loading="lazy">
    @endif

    <div class="blog-content">
        {!! $post->content !!}
    </div>

    @if($post->images->count())
    <div class="blog-gallery">
        <h3 style="color: #1a365d; margin-bottom: 1.5rem;">Gallery</h3>
        <div class="blog-gallery-grid">
            @foreach($post->images as $image)
            <figure class="blog-gallery-item">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? $post->title }}" loading="lazy">
                @if($image->caption)
                <figcaption>{{ $image->caption }}</figcaption>
                @endif
            </figure>
            @endforeach
        </div>
    </div>
    @endif
</article>

@if($related->count())
<div style="background: #f8f9fa; padding: 4rem 2rem;">
    <div class="content-section">
        <h2 class="section-title">Related Posts</h2>
        <div class="blog-grid">
            @foreach($related as $relPost)
            <article class="blog-card">
                <a href="{{ url('/blog/' . $relPost->slug) }}">
                    @if($relPost->featured_image)
                    <img src="{{ asset('storage/' . $relPost->featured_image) }}" alt="{{ $relPost->title }}" class="blog-card-image" loading="lazy">
                    @else
                    <div class="blog-card-image blog-card-placeholder">
                        <span>The Mureed</span>
                    </div>
                    @endif
                </a>
                <div class="blog-card-content">
                    <div class="blog-card-meta">
                        <span>{{ $relPost->published_at->format('M d, Y') }}</span>
                    </div>
                    <h3><a href="{{ url('/blog/' . $relPost->slug) }}">{{ $relPost->title }}</a></h3>
                    @if($relPost->excerpt)<p>{{ $relPost->excerpt }}</p>@endif
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endif

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BlogPosting",
    "headline": @json($post->title),
    "author": {
        "@@type": "Person",
        "name": @json($post->author)
    },
    "datePublished": "{{ $post->published_at->toIso8601String() }}",
    "dateModified": "{{ $post->updated_at->toIso8601String() }}",
    @if($post->featured_image)
    "image": "{{ asset('storage/' . $post->featured_image) }}",
    @endif
    "description": @json($post->meta_description ?? $post->excerpt ?? Str::limit(strip_tags($post->content), 155)),
    "publisher": {
        "@@type": "Organization",
        "name": "The Mureed",
        "url": "{{ url('/') }}"
    }
}
</script>
@endsection
