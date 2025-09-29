@php
$setting = setting();
$contactus = \App\Models\Contactus::findOrFail(2);
$getintouch = \App\Models\Contactus::findOrFail(3);
@endphp

<section class="container mx-auto md:px-12">
    <div class="min-h-screen bg-white pt-6">
        <div class="mx-auto max-w-6xl px-6 py-6">
            <div class="grid grid-cols-1 gap-10 md:grid-cols-2 mt-6">
                {{-- LEFT: Info --}}
                <div class="max-w-xl">
                    <p class="text-xs uppercase tracking-widest text-slate-500 mb-3">Contact Us</p>
                    <h1 class="text-4xl font-extrabold leading-tight text-slate-900">
                        {{ $contactus->title }}
                    </h1>
                    <p class="mt-4 text-base leading-relaxed text-slate-600">
                        {{ $contactus->content }}
                    </p>

                    <div class="mt-8 space-y-6 text-sm">
                        <div>
                            <p class="font-semibold text-slate-800">Call Center</p>
                            <p class="mt-1 text-slate-600">{{$setting->phone_number}}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800">Email</p>
                            <p class="mt-1 text-slate-600">{{$setting->email}}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-800">Our Location</p>
                            <p class="mt-1 text-slate-600">
                                {{$setting->address}}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Form --}}
                <div>
                    <div class="rounded-xl bg-gray-100 p-6 shadow-sm md:p-8">
                        <h3 class="text-2xl md:text-3xl font-semibold text-slate-900">{{ $getintouch->title }}</h3>
                        <p class="mt-2 text-sm md:text-base leading-relaxed text-slate-600">
                            {{ $getintouch->content }}
                        </p>

                        @if (session('success'))
                        <div class="mt-4 rounded-md bg-green-50 p-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('contact.form') }}" class="mt-6 space-y-5" novalidate id="contact-form">
                            @csrf

                            <div>
                                <label for="name" class="block text-xs font-medium text-slate-700 mb-1">Full Name</label>
                                <input
                                    id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name"
                                    class="appearance-none w-full bg-transparent px-3 py-2 text-sm border-0 border-b-2 border-slate-200 
                   placeholder-slate-400 focus:border-indigo-500 focus:ring-0 transition text-slate-900"
                                    placeholder="Your full name">
                                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-xs font-medium text-slate-700 mb-1">Email</label>
                                <input
                                    id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                                    class="appearance-none w-full bg-transparent px-3 py-2 text-sm border-0 border-b-2 border-slate-200 
                   placeholder-slate-400 focus:border-indigo-500 focus:ring-0 transition text-slate-900"
                                    placeholder="you@mail.com">
                                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="subject" class="block text-xs font-medium text-slate-700 mb-1">Subject</label>
                                <input
                                    id="subject" name="subject" type="text" value="{{ old('subject') }}" required
                                    class="appearance-none w-full bg-transparent px-3 py-2 text-sm border-0 border-b-2 border-slate-200 
                   placeholder-slate-400 focus:border-indigo-500 focus:ring-0 transition text-slate-900"
                                    placeholder="How can we help?">
                                @error('subject') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="message" class="block text-xs font-medium text-slate-700 mb-1">Message</label>
                                <textarea
                                    id="message" name="message" rows="4" required
                                    class="appearance-none w-full bg-transparent px-3 py-2 text-sm border-0 border-b-2 border-slate-200 
                   placeholder-slate-400 focus:border-indigo-500 focus:ring-0 transition text-slate-900"
                                    placeholder="Write your message here...">{{ old('message') }}</textarea>
                                @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            {{-- Honeypot anti-bot (opsional) --}}
                            <input type="text" name="website" class="appearance-none hidden" tabindex="-1" autocomplete="off">

                            <div class="pt-1">
                                <button type="submit"
                                    class="inline-flex items-center rounded-lg bg-blue-900 px-4 py-2 text-sm font-semibold text-white
                   shadow hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    Send Message
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>