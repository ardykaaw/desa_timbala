@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .news-detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 20px;
    }
    
    .news-header {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 30px;
        border-bottom: 2px solid var(--secondary-color);
    }
    
    .news-title {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 20px;
        line-height: 1.3;
    }
    
    .news-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    
    .news-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--text-light);
        font-size: 0.95rem;
    }
    
    .news-meta-item i {
        color: var(--primary-color);
    }
    
    .news-category {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .news-featured-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .news-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-dark);
        text-align: justify;
    }
    
    .news-content p {
        margin-bottom: 20px;
    }
    
    .news-actions {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .back-button {
        background: var(--primary-color);
        color: white;
        padding: 12px 25px;
        border-radius: 10px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    
    .back-button:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .share-buttons {
        display: flex;
        gap: 10px;
    }
    
    .share-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .share-button.facebook {
        background: #3b5998;
    }
    
    .share-button.twitter {
        background: #1da1f2;
    }
    
    .share-button.whatsapp {
        background: #25d366;
    }
    
    .share-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .related-news {
        margin-top: 60px;
        padding-top: 40px;
        border-top: 2px solid var(--secondary-color);
    }
    
    .related-news h3 {
        color: var(--primary-color);
        margin-bottom: 30px;
        text-align: center;
    }
    
    .related-news-item {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border-left: 4px solid var(--secondary-color);
    }
    
    .related-news-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .related-news-item h4 {
        color: var(--primary-color);
        margin-bottom: 10px;
        font-size: 1.1rem;
    }
    
    .related-news-item p {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    
    .related-news-item a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .related-news-item a:hover {
        color: var(--secondary-color);
    }
    
    @media (max-width: 768px) {
        .news-title {
            font-size: 2rem;
        }
        
        .news-meta {
            flex-direction: column;
            gap: 15px;
        }
        
        .news-actions {
            flex-direction: column;
            text-align: center;
        }
        
        .news-featured-image {
            height: 250px;
        }
    }
</style>
@endpush

@section('content')
<div class="news-detail-container">
    <!-- News Header -->
    <div class="news-header">
        <h1 class="news-title">{{ $news->title }}</h1>
        
        <div class="news-meta">
            <div class="news-meta-item">
                <i class="fas fa-calendar"></i>
                <span>{{ $news->formatted_published_at }}</span>
            </div>
            <div class="news-meta-item">
                <i class="fas fa-user"></i>
                <span>{{ $news->author }}</span>
            </div>
            <div class="news-meta-item">
                <i class="fas fa-eye"></i>
                <span>{{ number_format($news->views) }} views</span>
            </div>
            <div class="news-category">
                {{ ucfirst($news->category) }}
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    @if($news->featured_image)
    <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="news-featured-image">
    @endif

    <!-- News Content -->
    <div class="news-content">
        {!! nl2br(e($news->content)) !!}
    </div>

    <!-- News Actions -->
    <div class="news-actions">
        <a href="{{ url()->previous() }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
        
        <div class="share-buttons">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="share-button facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $news->title }}" target="_blank" class="share-button twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://wa.me/?text={{ $news->title }} {{ url()->current() }}" target="_blank" class="share-button whatsapp">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>
    </div>

    <!-- Related News -->
    @if($relatedNews->count() > 0)
    <div class="related-news">
        <h3><i class="fas fa-newspaper me-2"></i>Berita Terkait</h3>
        
        @foreach($relatedNews as $related)
        <div class="related-news-item">
            <h4><a href="{{ route('news.detail', $related->slug) }}">{{ $related->title }}</a></h4>
            <p>{{ Str::limit($related->excerpt, 100) }}</p>
            <div class="news-meta-item">
                <i class="fas fa-calendar"></i>
                <span>{{ $related->formatted_published_at }}</span>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Increment views when page loads
    document.addEventListener('DOMContentLoaded', function() {
        fetch('{{ route("news.increment-views", $news->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        });
    });
</script>
@endpush
