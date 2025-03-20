<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="trainScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trainScheduleModalLabel">Добавить расписание поезда</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('schedules.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="departure_location" class="form-label">Место отправления</label>
                        <input type="text" class="form-control" id="departure_location" name="departure_location"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Дата отправления</label>
                        <input type="date" class="form-control" id="departure_date" name="departure_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="departure_time" class="form-label">Время отправления</label>
                        <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                    </div>

                    <div class="mb-3">
                        <label for="arrival_location" class="form-label">Место прибытия</label>
                        <input type="text" class="form-control" id="arrival_location" name="arrival_location" required>
                    </div>

                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Дата прибытия</label>
                        <input type="date" class="form-control" id="arrival_date" name="arrival_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Время прибытия</label>
                        <input type="time" class="form-control" id="arrival_time" name="arrival_time" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
