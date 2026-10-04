@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="space-y-4">
    <h1 class="text-2xl font-extrabold text-slate-900">Users</h1>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-left text-xs text-slate-500 bg-slate-50">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Active</th>
                    <th class="px-4 py-3">Last login</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-3 font-semibold">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $user->email }}</td>
                        <td class="px-4 py-3 uppercase text-xs font-bold">{{ $user->role }}</td>
                        <td class="px-4 py-3">{{ $user->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-4 py-3 text-slate-500">{{ $user->last_login_at?->format('d M Y, h:i A') ?? 'Never' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
