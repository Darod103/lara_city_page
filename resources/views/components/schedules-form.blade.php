<form action="{{route('schedules.update',$schedule->id)}}" method="POST">
    @csrf
    @method('PUT')
{{--    <input type="hidden" name="id" value="{{ $schedule->id }}">--}}

    <div class="mb-3">
        <label for="departure_location" class="form-label">Место отправления</label>
        <input type="text" class="form-control" id="departure_location" name="departure_location"
               required value="{{ $schedule->departure_location }}">
    </div>

    <div class="mb-3">
        <label for="departure_date" class="form-label">Дата отправления</label>
        <input type="date" class="form-control" id="departure_date" name="departure_date" required
               value="{{ \Carbon\Carbon::parse($schedule->departure_date)->format('Y-m-d') }}">
    </div>

    <div class="mb-3">

        <label for="departure_time" class="form-label">Время отправления</label>
        <input type="time" class="form-control" id="departure_time" name="departure_time" required
               value="{{ old('departure_time', $schedule->departure_time ? \Carbon\Carbon::parse($schedule->departure_time)->format('H:i') : '') }}">
    </div>

    <div class="mb-3">
        <label for="arrival_location" class="form-label">Место прибытия</label>
        <input type="text" class="form-control" id="arrival_location" name="arrival_location" required
               value="{{ $schedule->arrival_location}}">
    </div>

    <div class="mb-3">
        <label for="arrival_date" class="form-label">Дата прибытия</label>
        <input type="date" class="form-control" id="arrival_date" name="arrival_date" required
               value="{{ \Carbon\Carbon::parse($schedule->arrival_date)->format('Y-m-d') }}">
    </div>

    <div class="mb-3">
        <label for="arrival_time" class="form-label">Время прибытия</label>
        <input type="time" class="form-control" id="arrival_time" name="arrival_time" required
               value="{{ old('departure_time', $schedule->arrival_time ? \Carbon\Carbon::parse($schedule->arrival_time)->format('H:i') : '') }}">
    </div>

    <button type="submit" class="btn btn-primary w-100">Сохранить</button>
</form>
