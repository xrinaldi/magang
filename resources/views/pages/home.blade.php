@extends('layouts.app')

@section('title', 'Welcome to Dugg Coffee')

@section('content')
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Welcome to Dugg Coffee – Your Green Escape</h1>
            <p>At Dugg Coffee, we believe a great cup of coffee deserves a beautiful place to be enjoyed. Nestled in the heart of Bandung, our garden-inspired space offers a peaceful escape where you can unwind, create, and connect with nature.</p>
            <a href="#order" class="hero-cta">Order Now</a>
        </div>
        <div class="hero-visual">
            <div class="coffee-cups">
                <div class="coffee-cup">
                    <div class="cup-handle"></div>
                </div>
                <div class="coffee-cup coffee-cup-2">
                    <div class="cup-handle"></div>
                </div>
            </div>
            <div class="coconut"></div>
            <div class="leaf"></div>
        </div>
    </div>
</section>
@endsection
