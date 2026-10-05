@extends('layouts.app')

@section('content')
<div style="max-width: 680px; margin: 1rem auto;">
    <div style="margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.02em;">User Profile</h1>
            <p style="color: var(--text-muted); font-size: 0.88rem; margin-top: 2px;">
                Detailed information and assigned role privileges
            </p>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
            &larr; Back to Users
        </a>
    </div>

    <div class="card">
        <div style="padding: 2rem; border-bottom: 1px solid var(--border-color); display: flex; align-items: center; gap: 1.5rem; background: linear-gradient(to right, #ffffff, #f8fafc);">
            <div style="width: 72px; height: 72px; border-radius: var(--radius-full); background: linear-gradient(135deg, var(--primary), var(--accent)); color: white; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: 700; box-shadow: 0 8px 16px rgba(79, 70, 229, 0.25);">
                {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>
            <div>
                <h2 style="font-size: 1.35rem; font-weight: 700;">{{ $user->name }}</h2>
                <p style="color: var(--text-muted); font-size: 0.9rem;">{{ $user->email }}</p>
                <div style="margin-top: 8px;">
                    @php
                        $roleName = $user->role->role_name ?? 'None';
                        $badgeClass = match(strtolower($roleName)) {
                            'administrator' => 'badge-admin',
                            'manager' => 'badge-manager',
                            'staff' => 'badge-staff',
                            'student' => 'badge-student',
                            default => 'badge-default'
                        };
                    @endphp
                    <span class="role-badge {{ $badgeClass }}">
                        <span style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; background-color: currentColor;"></span>
                        {{ $roleName }}
                    </span>
                </div>
            </div>
        </div>

        <div class="card-body">
            <h3 style="font-size: 0.95rem; font-weight: 700; color: #475569; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 0.05em;">
                Account Details
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem;">
                <div style="background: #f8fafc; padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 4px;">User ID</span>
                    <strong style="font-size: 1rem; color: var(--text-main);">#{{ $user->id }}</strong>
                </div>

                <div style="background: #f8fafc; padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 4px;">Joined Date</span>
                    <strong style="font-size: 1rem; color: var(--text-main);">{{ $user->created_at?->format('F d, Y - h:i A') ?? 'N/A' }}</strong>
                </div>

                <div style="background: #f8fafc; padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 4px;">Last Updated</span>
                    <strong style="font-size: 1rem; color: var(--text-main);">{{ $user->updated_at?->format('F d, Y - h:i A') ?? 'N/A' }}</strong>
                </div>

                <div style="background: #f8fafc; padding: 1rem; border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                    <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 4px;">Role Description</span>
                    <strong style="font-size: 0.92rem; color: var(--text-main); font-weight: 500;">
                        {{ $user->role->description ?? 'No specific role description assigned.' }}
                    </strong>
                </div>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 2rem; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                    Edit Account
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
