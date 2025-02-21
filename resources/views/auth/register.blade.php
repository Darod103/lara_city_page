<x-guest-layout>
    <h3 class="text-center mb-3">{{ __('Регистрация') }}</h3>

    <form method="POST" action="{{ route('register') }}" class="d-flex flex-column">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Имя') }}</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name') <p class="text-danger mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <p class="text-danger mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Пароль') }}</label>
            <input id="password" class="form-control" type="password" name="password" required>
            @error('password') <p class="text-danger mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Подтвердите пароль') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
            @error('password_confirmation') <p class="text-danger mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('login') }}" class="small text-muted text-decoration-none">{{ __('Уже зарегистрированы?') }}</a>
            <button type="submit" class="btn btn-success">{{ __('Зарегистрироваться') }}</button>
        </div>
    </form>
</x-guest-layout>
