@extends('layouts.app')

@section('title', 'Blog - The Mureed')
@section('meta_description', 'Explore travel tips, Maldives guides, and stories from The Mureed resort. Discover island life, local culture, and luxury hospitality insights.')
@section('og_title', 'Blog - The Mureed')
@section('og_description', 'Explore travel tips, Maldives guides, and stories from The Mureed resort.')

@section('content')
<div class="page-header">
    <h1>Our Blog</h1>
    <p>Stories, travel tips, and insights from paradise</p>
</div>

<div class="content-section">
    @if($posts->count())
    <div class="blog-grid">
        @foreach($posts as $post)
        <article class="blog-card">
            <a href="{{ url('/blog/' . $post->slug) }}">
                @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="blog-card-image" loading="lazy">
                @else
                <div class="blog-card-image blog-card-placeholder">
                    <span>The Mureed</span>
                </div>
                @endif
            </a>
            <div class="blog-card-content">
                <div class="blog-card-meta">
                    <span>{{ $post->published_at->format('M d, Y') }}</span>
                    <span>{{ $post->author }}</span>
                </div>
                <h2><a href="{{ url('/blog/' . $post->slug) }}">{{ $post->title }}</a></h2>
                @if($post->excerpt)
                <p>{{ $post->excerpt }}</p>
                @endif
                <a href="{{ url('/blog/' . $post->slug) }}" class="blog-read-more">Read More</a>
            </div>
        </article>
        @endforeach
    </div>

    <div style="display: flex; justify-content: center; margin-top: 3rem;">
        {{ $posts->links() }}
    </div>
    @else
    <div style="text-align: center; padding: 4rem 2rem;">
        <h2 style="color: #1a365d; margin-bottom: 1rem;">Coming Soon</h2>
        <p style="color: #666;">We're working on exciting stories and travel guides. Check back soon!</p>
    </div>
    @endif
</div>
@endsection
