@extends('layouts.app')

@section('content')
<div style="max-width: 440px; margin: 2rem auto;">
    <div class="card">
        <div style="padding: 2.2rem 2rem 1rem; text-align: center;">
            <div style="width: 56px; height: 56px; margin: 0 auto 1rem; background: linear-gradient(135deg, #4f46e5, #0ea5e9); border-radius: 14px; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 8px 18px rgba(79, 70, 229, 0.3);">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                    <polyline points="10 17 15 12 10 7"></polyline>
                    <line x1="15" y1="12" x2="3" y2="12"></line>
                </svg>
            </div>
            <h2 style="font-size: 1.5rem; font-weight: 700; letter-spacing: -0.02em;">Welcome Back</h2>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 4px;">Sign in to your account to continue</p>
        </div>

        <div class="card-body" style="padding-top: 0.5rem;">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', 'admin@example.com') }}" required autofocus class="form-control @error('email') is-invalid @enderror" placeholder="name@domain.com">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" required value="password123" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                    <label style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; cursor: pointer; color: var(--text-muted);">
                        <input type="checkbox" name="remember" style="accent-color: var(--primary);">
                        <span>Remember me</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px;">
                    Sign In
                </button>
            </form>

            <div style="margin-top: 1.5rem; padding: 12px; background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px; font-size: 0.8rem; color: #475569;">
                <strong>Exam Demo Credentials:</strong><br>
                Email: <code>admin@example.com</code><br>
                Password: <code>password123</code>
            </div>

            <p style="text-align: center; margin-top: 1.5rem; font-size: 0.88rem; color: var(--text-muted);">
                Don't have an account? <a href="{{ route('register') }}" style="color: var(--primary); font-weight: 600; text-decoration: none;">Register here</a>
            </p>
        </div>
    </div>
</div>
@endsection
