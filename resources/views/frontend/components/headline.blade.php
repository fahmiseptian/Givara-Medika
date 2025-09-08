@php
    use App\Models\Headline;
    $headlines = Headline::take(3)->get();
@endphp
<section class="container mx-auto py-12 border-b">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        @foreach ($headlines as $headline)
            <div class="flex items-start space-x-4">
                <!-- Icon -->
                <div
                    class="flex-shrink-0 w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center text-blue-600 text-2xl">
                    <i class="{{ $headline->icon }}"></i>
                </div>
                <!-- Text -->
                <div>
                    <h3 class="text-2xl font-semibold text-blue-900">{{ $headline->title }}</h3>
                    <p class="text-lg text-gray-600">
                        {{ $headline->content }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>
