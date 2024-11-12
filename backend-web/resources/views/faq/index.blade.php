<!-- filepath: /workspaces/Backend-web/backend-web/resources/views/faq/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Frequently Asked Questions</h1>
    @foreach($categories as $category)
        <div class="mb-4">
            <h3>{{ $category->name }}</h3>
            <div class="accordion" id="faqAccordion{{ $category->id }}">
                @foreach($category->faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $faq->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion{{ $category->id }}">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection