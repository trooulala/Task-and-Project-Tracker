@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 400px; border-radius: 15px;">
        <div class="card-body">
            <h3 class="fw-bold">Task<span class="text-primary">Tracker</span></h3>
            <p class="text-muted">Masuk ke akun kamu</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control bg-light" placeholder="admin@energeek.id">
                </div>
                <div class="mb-4 text-start">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control bg-light" placeholder="********">
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Masuk</button>
            </form>
        </div>
    </div>
</div>
@endsection