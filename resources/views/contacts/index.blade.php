@extends('layouts.app')
@section('title', 'Contact Us')

<style>
    form select option {
        color: black;
    }
</style>
@section('body')
<div class="relative w-full h-64 overflow-hidden">
    <img src="{{ asset('images/about-banner.jpg') }}" alt="contact banner" class="w-full h-full object-cover filter brightness-70 mb-4 ">
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
        <h1 class="text-4xl font-bold font-serif mb-2">Contact Us</h1>
        <p class="text-lg">Phone: (092) 376-501</p>
    </div>
</div>
<div>
    <div class="container mx-auto text-center">
        <h1 class="text-2xl mb-4">Contact Us</h1><span>
            <div class="bg-gray-600 mx-auto"
                style="width: 64px; height: 4px; margin: 8px auto 24px auto; border-radius: 2px;"></div>
        </span>
        <h3 class="text-white">Subject</h3>
        <form action="" method="POST" class="space-y-4">
            @csrf
            <select name="subject" class="w-150 p-2 border border-gray-300 rounded text-white">
                <option value="general">General Inquiry</option>
                <option value="support">Support Request</option>
                <option value="feedback">Feedback</option>
                <option value="other">Other</option>
            </select>
            <div>
                <input type="text" name="fullname" placeholder="Full Name" class="w-150 p-2 border border-gray-300 rounded text-white" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email Address" class="w-150 p-2 border border-gray-300 rounded text-white" required>
            </div>
            <div>
                <input type="text" name="phone" placeholder="Phone Number" class="w-150 p-2 border border-gray-300 rounded text-white" required>
            </div>
            <div>
                <textarea name="message" placeholder="Your Message" class="w-150 p-2 border border-gray-300 rounded text-white" rows="4" required></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-gray-600 text-white px-20 py-4 rounded-lg hover:bg-gray-500 text-sm font-poppins" style="font-family: 'Poppins', sans-serif;">
                    SEND
                </button>
            </div>
            @if(session('success'))
            <div class="text-green-500 mt-4">
                {{ session('success') }}
            </div>
            @endif
            @if($errors->any())
            <div class="text-red-500 mt-4">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p class="text-xs text-gray-500">
                This site is protected by hCaptcha and the hCaptcha Privacy Policy and Terms of Service apply.
            </p>
        </form>
    </div>
    <!-- Add Alpine.js in your layout if not already included -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <div class="flex justify-center mt-15">
        <div class="space-y-4 text-white w-full max-w-xl">
            <!-- Booking & Cancellation -->
            <div x-data="{ open: false }">
                <hr class="w-half mx-auto border-gray-400">
                <div @click="open = !open" class="py-2 cursor-pointer flex justify-between items-center w-half mx-auto">
                    <span>Ordering & Cancellation</span>
                    <span x-text="open ? '▲' : '▼'"></span>
                </div>
                <div x-show="open" class="bg-transparent px-4 py-2 w-half mx-auto text-sm" x-transition>
                    <p class="mb-2">You can book a treatment directly on our website, by phone, or at any of our spas.</p>
                    <p class="mb-2">If you need to cancel, please inform us as soon as possible, ideally at least 24 hours in advance, to help us adjust our schedule smoothly.</p>
                    <p>We do not charge a cancellation fee, but your cooperation allows us to offer the best experience to all our clients.</p>
                </div>
            </div>
            <!-- Hygiene & Safety -->
            <div x-data="{ open: false }">
                <hr class="w-half mx-auto border-gray-400">
                <div @click="open = !open" class="py-2 cursor-pointer flex justify-between items-center w-half mx-auto">
                    <span>Hygiene & Safety</span>
                    <span x-text="open ? '▲' : '▼'"></span>
                </div>
                <div x-show="open" class="bg-transparent px-4 py-2 w-half mx-auto text-sm" x-transition>
                    <p>All our facilities are cleaned and sanitized regularly to ensure your safety and comfort.</p>
                </div>
            </div>
            <!-- Vouchers -->
            <div x-data="{ open: false }">
                <hr class="w-half mx-auto border-gray-400">
                <div @click="open = !open" class="py-2 cursor-pointer flex justify-between items-center w-half mx-auto">
                    <span>Vouchers</span>
                    <span x-text="open ? '▲' : '▼'"></span>
                </div>
                <div x-show="open" class="bg-transparent px-4 py-2 w-half mx-auto text-sm" x-transition>
                    <p>You can purchase vouchers online or at our locations. Vouchers are valid for one year from the date of purchase.</p>
                </div>
            </div>
            <!-- Customer Experience -->
            <div x-data="{ open: false }">
                <hr class="w-half mx-auto border-gray-400">
                <div @click="open = !open" class="py-2 cursor-pointer flex justify-between items-center w-half mx-auto">
                    <span>Customer Experience</span>
                    <span x-text="open ? '▲' : '▼'"></span>
                </div>
                <div x-show="open" class="bg-transparent px-4 py-2 w-half mx-auto text-sm" x-transition>
                    <p>Your feedback is important to us. Please let us know about your experience so we can continue to improve our services.</p>
                </div>
            </div>
            <!-- Membership -->
            <div x-data="{ open: false }">
                <hr class="w-half mx-auto border-gray-400">
                <div @click="open = !open" class="py-2 cursor-pointer flex justify-between items-center w-half mx-auto">
                    <span>Membership</span>
                    <span x-text="open ? '▲' : '▼'"></span>
                </div>
                <div x-show="open" class="bg-transparent px-4 py-2 w-half mx-auto text-sm" x-transition>
                    <p>Join our membership program for exclusive benefits and discounts. Contact us for more details.</p>
                </div>
                <hr class="w-half mx-auto border-gray-400">
            </div>
        </div>
    </div>
</div>
@endsection