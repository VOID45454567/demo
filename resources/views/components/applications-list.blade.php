<div class="applications">
    @foreach ($applications as $application)
        <div class="application-item">
            <h3>{{ $application->course->name }}</h3>
            <p>Дата: {{ $application->prefer_date->format('d-m-Y') }}</p>
            <p>Статус <span class="{{ 'status ' . $application->status}}">{{ $application->getStatus() }}</span></p>

            <p>Создатель: {{ $application->user->login }}</p>
            <p>Оплата: {{ $application->getPaymentMethod() }}</p>

            @if (request()->path() === 'auth/admin/dashboard')
                <h4>Сменить статус</h4>
                <form action="{{ route('applications.set-status', ['id' => $application->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <select name="status">
                        <option value="{{ $application->status }}">{{ $application->getStatus() }}</option>
                        <option value="completed">{{ $application->getStatus('completed') }}</option>
                        <option value="pending">{{ $application->getStatus('pending') }}</option>
                        <option value="created">{{ $application->getStatus('created') }}</option>
                    </select>
                    <button type="submit">Сохранить</button>
                </form>
            @endif

            @if ($application->status === 'completed')
                <form action="{{ route('applications.add-review', ['id' => $application->id]) }}" method="post">
                    @csrf
                    <textarea name="text"></textarea>
                    <button type="submit">Оставить отзыв</button>

                </form>
            @endif
            <div class="reviews">
                <h4>Отзывы</h4>
                @if (count($application->reviews->toArray()) === 0)
                    <p>Пока нет</p>
                @else

                    @foreach ($application->reviews as $review)
                        <div class="review">
                            <p>{{ $review->user->login }}: {{ $review->text }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    @endforeach
    @push('styles')
        <style>
            .applications {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;

                .application-item {
                    border: 1px solid #3498db;
                    padding: 10px;
                    border-radius: 10px;
                    width: 49%;
                    display: flex;
                    flex-direction: column;
                    gap: 10px;

                    .status {
                        border-radius: 10px;
                        color: white;
                        padding: 5px;
                        width: 40px;
                    }

                    .created {
                        background-color: #3498db;
                    }

                    .pending {
                        background-color: #d3b81d;
                    }

                    .completed {
                        background-color: #5bc505;
                    }
                }
            }

            .modal-close:hover {
                background: #f5f5f5;
            }
        </style>
    @endpush
</div>