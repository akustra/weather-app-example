<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden">

                <div id="actual-weather" class="mb-12 text-right">
                    <div class="text-8xl">
                        {{ $weather->temp }} <span class="text-gray-500">&deg;C</span>
                    </div>
                    <div class="text-4xl capitalize">
                        {{ $weather->description }}
                    </div>
                    <div class="text-2xl">
                        Prędkość wiatru {{ number_format($weather->wind_speed * 3.6, 1, ',', ' ') }} km/h
                    </div>
                </div>

                <div id="forecast">
                    <div class="grid lg:grid-cols-7 md:grid-cols-4 sm:grid-cols-1 gap-4">
                        @foreach ($forecast as $f)
                        <div class="text-center flex flex-col bg-gray-800 p-2">

                            <div class="text-xl">
                                {{ $f->dt->toFormattedDateString() }}
                            </div>

                            <div class="mb-4 flex justify-center">
                                <img class="block" src="http://openweathermap.org/img/wn/{{ $f->icon }}@2x.png" alt="">
                            </div>

                            <div class="text-2xl font-semibold bg-gray-100 text-gray-900">
                                {{ $f->temp_day }} <span class="text-gray-500">&deg;C</span>
                            </div>
                            <div class="text-2xl font-semibold bg-gray-900 text-gray-100 mb-4">
                                {{ $f->temp_night }} <span class="text-gray-500">&deg;C</span>
                            </div>

                            <div class="text-lg mb-4 leading-5 flex-grow">
                                {{ ucfirst($f->description) }}
                            </div>

                            <div class="text-lg">
                                <span>Chmury</span> {{ number_format($f->clouds, 0) }} <span class="text-gray-500">%</span>
                            </div>

                            <div class="text-lg">
                            <span>Wiatr</span> {{ number_format($f->wind_speed * 3.6, 1, ',', ' ') }} <span class="text-gray-500">km/h</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>