@extends('layouts.app')

@section('content')
<div style="max-width: 680px; margin: 1rem auto;">
    <div style="margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.02em;">Edit User Account</h1>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 2px;">
                Updating account details for <strong>{{ $user->name }}</strong>
            </p>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
            &larr; Back to Users
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="form-group">
                    <label for="name" class="form-label">Full Name <span style="color: var(--danger);">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address <span style="color: var(--danger);">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div class="form-group">
                    <label for="role_id" class="form-label">Assign Role <span style="color: var(--danger);">*</span></label>
                    <select id="role_id" name="role_id" required class="form-select @error('role_id') is-invalid @enderror">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ (old('role_id', $user->role_id) == $role->id) ? 'selected' : '' }}>
                                {{ $role->role_name }} &mdash; {{ $role->description }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Leave empty to keep existing password">
                    <span class="form-hint">Only enter a new password if you want to change it (min. 8 characters).</span>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-type new password">
                </div>

                <!-- Actions -->
                <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 2rem; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
