@extends('layouts.app')

@section('content')
<div style="max-width: 480px; margin: 2rem auto;">
    <div class="card">
        <div style="padding: 2.2rem 2rem 1rem; text-align: center;">
            <div style="width: 56px; height: 56px; margin: 0 auto 1rem; background: linear-gradient(135deg, #10b981, #0ea5e9); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 8px 18px rgba(16, 185, 129, 0.3);">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <line x1="19" y1="8" x2="19" y2="14"></line>
                    <line x1="22" y1="11" x2="16" y2="11"></line>
                </svg>
            </div>
            <h2 style="font-size: 1.5rem; font-weight: 700; letter-spacing: -0.02em;">Create Account</h2>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 4px;">New users are assigned the default <strong>Student</strong> role</p>
        </div>

        <div class="card-body" style="padding-top: 0.5rem;">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control @error('name') is-invalid @enderror" placeholder="e.g. John Doe">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" placeholder="name@domain.com">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" required class="form-control @error('password') is-invalid @enderror" placeholder="Minimum 8 characters">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control" placeholder="Repeat your password">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; margin-top: 0.5rem;">
                    Complete Registration
                </button>
            </form>

            <p style="text-align: center; margin-top: 1.5rem; font-size: 0.88rem; color: var(--text-muted);">
                Already registered? <a href="{{ route('login') }}" style="color: var(--primary); font-weight: 600; text-decoration: none;">Sign in here</a>
            </p>
        </div>
    </div>
</div>
@endsection
