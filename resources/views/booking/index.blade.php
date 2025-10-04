<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Your Experience - Jacknails Kenya</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Luxury Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Playfair+Display:wght@300;400;500;600;700;800;900&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Luxury Typography */
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        
        /* Luxury Color Palette */
        :root {
            --luxury-gold: #D4AF37;
            --luxury-dark-gold: #B8941F;
            --luxury-cream: #F8F6F0;
            --luxury-charcoal: #2C2C2C;
            --luxury-pearl: #F5F5F5;
        }
        
        /* Custom Gradients */
        .luxury-gradient {
            background: linear-gradient(135deg, var(--luxury-gold) 0%, var(--luxury-dark-gold) 100%);
        }
        
        .luxury-text-gradient {
            background: linear-gradient(135deg, var(--luxury-gold) 0%, var(--luxury-dark-gold) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .luxury-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Premium Shadows */
        .luxury-shadow {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 10px 20px rgba(0, 0, 0, 0.05);
        }
        
        .luxury-shadow-hover {
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15), 0 15px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-poppins" style="background: linear-gradient(180deg, var(--luxury-cream) 0%, #ffffff 100%);">
    <!-- Luxury Navigation -->
    <nav class="bg-white/95 backdrop-blur-xl border-b border-amber-300/20 luxury-shadow">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-4">
                        <div class="w-12 h-12 luxury-gradient rounded-none flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-playfair font-bold text-gray-900">Jacknails</h1>
                            <span class="text-xs text-gray-600 tracking-wider font-montserrat">KENYA</span>
                        </div>
                    </a>
                </div>
                <a href="{{ route('home') }}" class="flex items-center text-gray-600 hover:text-gray-900 transition-colors font-montserrat font-medium text-sm tracking-wider uppercase">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Home
                </a>
            </div>
        </div>
    </nav>

    <!-- Luxury Main Content -->
    <div class="min-h-screen">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 py-16">
            <!-- Luxury Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-8 py-4 luxury-glass border border-amber-300/30 rounded-none text-sm font-montserrat font-medium text-gray-700 mb-8 tracking-wider">
                    <div class="w-2 h-2 luxury-gradient rounded-full mr-4"></div>
                    EXPERIENCE RESERVATION
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-playfair font-light text-gray-900 mb-8 leading-tight">
                    Reserve Your
                    <span class="block luxury-text-gradient font-bold italic">Experience</span>
                </h1>
                
                <!-- Elegant divider -->
                <div class="flex items-center justify-center space-x-6 mb-8">
                    <div class="w-16 h-px luxury-gradient"></div>
                    <div class="w-4 h-4 luxury-gradient rounded-full"></div>
                    <div class="w-16 h-px luxury-gradient"></div>
                </div>
                
                <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-poppins font-light">
                    Curate your perfect luxury experience with our bespoke services and personalized attention.
                </p>
            </div>

            <!-- Luxury Progress Stepper -->
            <div class="mb-20">
                <div class="flex items-center justify-center max-w-4xl mx-auto">
                    <div class="flex items-center" id="step-1">
                        <div class="w-14 h-14 luxury-gradient rounded-none flex items-center justify-center text-white font-montserrat font-bold step-circle active luxury-shadow">1</div>
                        <div class="ml-4 hidden sm:block">
                            <div class="font-montserrat font-semibold text-gray-900 tracking-wider uppercase text-sm">Services</div>
                            <div class="text-xs text-gray-600 font-poppins">Select Experience</div>
                        </div>
                    </div>
                    <div class="flex-1 h-px bg-gray-200 mx-8">
                        <div class="h-full luxury-gradient transition-all duration-700" style="width: 0%" id="progress-bar"></div>
                    </div>
                    <div class="flex items-center" id="step-2">
                        <div class="w-14 h-14 bg-gray-100 border-2 border-gray-200 rounded-none flex items-center justify-center text-gray-400 font-montserrat font-bold step-circle">2</div>
                        <div class="ml-4 hidden sm:block">
                            <div class="font-montserrat font-semibold text-gray-400 tracking-wider uppercase text-sm">Schedule</div>
                            <div class="text-xs text-gray-400 font-poppins">Choose Time</div>
                        </div>
                    </div>
                    <div class="flex-1 h-px bg-gray-200 mx-8"></div>
                    <div class="flex items-center" id="step-3">
                        <div class="w-14 h-14 bg-gray-100 border-2 border-gray-200 rounded-none flex items-center justify-center text-gray-400 font-montserrat font-bold step-circle">3</div>
                        <div class="ml-4 hidden sm:block">
                            <div class="font-montserrat font-semibold text-gray-400 tracking-wider uppercase text-sm">Details</div>
                            <div class="text-xs text-gray-400 font-poppins">Personal Info</div>
                        </div>
                    </div>
                    <div class="flex-1 h-px bg-gray-200 mx-8"></div>
                    <div class="flex items-center" id="step-4">
                        <div class="w-14 h-14 bg-gray-100 border-2 border-gray-200 rounded-none flex items-center justify-center text-gray-400 font-montserrat font-bold step-circle">4</div>
                        <div class="ml-4 hidden sm:block">
                            <div class="font-montserrat font-semibold text-gray-400 tracking-wider uppercase text-sm">Confirm</div>
                            <div class="text-xs text-gray-400 font-poppins">Finalize</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Luxury Booking Form -->
            <div class="bg-white luxury-shadow hover:luxury-shadow-hover transition-all duration-700 border border-gray-100 hover:border-amber-200 p-12 lg:p-16">
                <form id="booking-form">
                    @csrf
                    
                    <!-- Step 1: Luxury Service Selection -->
                    <div id="step-content-1" class="step-content">
                        <div class="text-center mb-12">
                            <h2 class="text-4xl md:text-5xl font-playfair font-light text-gray-900 mb-4">
                                Select Your <span class="luxury-text-gradient font-bold italic">Services</span>
                            </h2>
                            <p class="text-lg text-gray-600 font-poppins font-light">Choose from our curated collection of luxury experiences</p>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            @foreach($services as $service)
                                <div class="service-card group bg-white border border-gray-100 hover:border-amber-200 p-8 cursor-pointer hover:luxury-shadow-hover transition-all duration-500 hover:-translate-y-1" data-service-id="{{ $service->id }}" data-price="{{ $service->price }}">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-4">
                                                <h3 class="text-2xl font-playfair font-semibold text-gray-900 group-hover:luxury-text-gradient transition-all duration-500">{{ $service->name }}</h3>
                                                @if($service->is_popular)
                                                    <span class="ml-4 luxury-glass border border-amber-300/50 text-amber-700 px-3 py-1 text-xs font-montserrat font-medium tracking-wider uppercase">Signature</span>
                                                @endif
                                            </div>
                                            <p class="text-gray-600 mb-4 font-poppins leading-relaxed">{{ Str::limit($service->description, 120) }}</p>
                                            <div class="flex items-center text-sm text-gray-500 font-montserrat">
                                                <svg class="w-4 h-4 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $service->formatted_duration }}
                                            </div>
                                        </div>
                                        <div class="text-right ml-6 flex-shrink-0">
                                            <div class="text-2xl font-playfair font-bold luxury-text-gradient mb-4">{{ $service->formatted_price }}</div>
                                            <div class="w-6 h-6 border-2 border-gray-300 group-hover:border-amber-400 service-checkbox transition-all duration-300"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Luxury Summary Section -->
                        <div class="mt-12 luxury-glass border border-amber-300/30 p-8">
                            <div class="flex justify-between items-center mb-6">
                                <div class="font-montserrat font-medium text-gray-700 tracking-wider uppercase text-sm">
                                    Selected: <span id="selected-count" class="luxury-text-gradient font-bold">0</span> Services
                                </div>
                                <div class="text-3xl font-playfair font-bold luxury-text-gradient">
                                    <span id="total-amount">KSh 0</span>
                                </div>
                            </div>
                            <button type="button" id="next-step-1" class="w-full luxury-gradient text-white px-8 py-4 font-montserrat font-medium text-lg tracking-wider uppercase luxury-shadow hover:luxury-shadow-hover transition-all duration-500 transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none" disabled>
                                Continue to Schedule
                                <svg class="w-5 h-5 ml-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Time Selection -->
                    <div id="step-content-2" class="step-content hidden">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Select Date & Time</h2>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3">Preferred Date</label>
                                <input type="date" id="booking-date" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-500 focus:border-rose-500" min="{{ date('Y-m-d') }}">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-3">Available Times</label>
                                <div id="time-slots" class="grid grid-cols-2 gap-3 max-h-64 overflow-y-auto">
                                    <div class="text-gray-500 text-center py-8 col-span-2">Select a date to view available times</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" id="prev-step-2" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-medium transition-colors">
                                ← Back
                            </button>
                            <button type="button" id="next-step-2" class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-3 rounded-xl font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Continue to Details
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Contact Information -->
                    <div id="step-content-3" class="step-content hidden">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Your Details</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Full Name *</label>
                                <input type="text" name="client_name" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="Enter your full name">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Phone Number *</label>
                                <input type="tel" name="client_phone" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="+254 700 000 000">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-2">Email Address *</label>
                                <input type="email" name="client_email" required class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="your@email.com">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-2">Special Requests (Optional)</label>
                                <textarea name="special_requests" rows="3" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-rose-500 focus:border-rose-500" placeholder="Any special requests or preferences..."></textarea>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" id="prev-step-3" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-medium transition-colors">
                                ← Back
                            </button>
                            <button type="button" id="next-step-3" class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-3 rounded-xl font-medium transition-colors">
                                Review & Confirm
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div id="step-content-4" class="step-content hidden">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Confirm Your Booking</h2>
                        
                        <!-- Booking Summary -->
                        <div class="bg-gray-50 rounded-xl p-6 mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Booking Summary</h3>
                            <div id="booking-summary" class="space-y-3">
                                <!-- Summary will be populated by JavaScript -->
                            </div>
                        </div>
                        
                        <!-- Payment Method -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Payment Method</h3>
                            <div class="space-y-3">
                                <label class="payment-option flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-rose-300 hover:bg-rose-50/50 transition-all duration-200" data-payment="mpesa">
                                    <input type="radio" name="payment_method" value="mpesa" class="w-4 h-4 text-rose-500 border-gray-300 focus:ring-rose-500">
                                    <div class="ml-4 flex-1">
                                        <div class="font-medium text-gray-900">M-Pesa</div>
                                        <div class="text-sm text-gray-600">Pay securely with M-Pesa mobile money</div>
                                    </div>
                                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Recommended</span>
                                </label>
                                <label class="payment-option flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-rose-300 hover:bg-rose-50/50 transition-all duration-200" data-payment="cash">
                                    <input type="radio" name="payment_method" value="cash" class="w-4 h-4 text-rose-500 border-gray-300 focus:ring-rose-500">
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">Cash Payment</div>
                                        <div class="text-sm text-gray-600">Pay in cash at the salon</div>
                                    </div>
                                </label>
                                <label class="payment-option flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:border-rose-300 hover:bg-rose-50/50 transition-all duration-200" data-payment="card">
                                    <input type="radio" name="payment_method" value="card" class="w-4 h-4 text-rose-500 border-gray-300 focus:ring-rose-500">
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">Card Payment</div>
                                        <div class="text-sm text-gray-600">Pay with credit or debit card</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="button" id="prev-step-4" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-medium transition-colors">
                                ← Back
                            </button>
                            <button type="button" id="complete-booking" class="bg-rose-500 hover:bg-rose-600 text-white px-8 py-3 rounded-xl font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                Confirm Booking
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Booking JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 1;
            let selectedServices = [];
            let selectedTimeSlot = null;
            let selectedPayment = null;
            let bookingData = {};

            // Service Selection
            document.querySelectorAll('.service-card').forEach(card => {
                card.addEventListener('click', function() {
                    const serviceId = this.dataset.serviceId;
                    const price = parseFloat(this.dataset.price);
                    const serviceName = this.querySelector('h3').textContent;
                    const checkbox = this.querySelector('.service-checkbox');
                    
                    if (selectedServices.find(s => s.id === serviceId)) {
                        selectedServices = selectedServices.filter(s => s.id !== serviceId);
                        checkbox.classList.remove('bg-rose-500', 'border-rose-500');
                        checkbox.classList.add('border-gray-300');
                        checkbox.innerHTML = '';
                        this.classList.remove('border-rose-300', 'bg-rose-50/50');
                        this.classList.add('border-gray-200');
                    } else {
                        selectedServices.push({id: serviceId, price: price, name: serviceName});
                        checkbox.classList.remove('border-gray-300');
                        checkbox.classList.add('bg-rose-500', 'border-rose-500');
                        checkbox.innerHTML = '<svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>';
                        this.classList.remove('border-gray-200');
                        this.classList.add('border-rose-300', 'bg-rose-50/50');
                    }
                    
                    updateServiceSummary();
                });
            });

            function updateServiceSummary() {
                const count = selectedServices.length;
                const total = selectedServices.reduce((sum, service) => sum + service.price, 0);
                
                document.getElementById('selected-count').textContent = count;
                document.getElementById('total-amount').textContent = `KSh ${total.toLocaleString()}`;
                document.getElementById('next-step-1').disabled = count === 0;
            }

            // Date Selection
            document.getElementById('booking-date').addEventListener('change', function() {
                const date = this.value;
                if (date && selectedServices.length > 0) {
                    fetchTimeSlots(date);
                }
            });

            function fetchTimeSlots(date) {
                fetch(`{{ route('booking.timeslots') }}?date=${date}&service_id=${selectedServices[0].id}`)
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('time-slots');
                        container.innerHTML = '';
                        
                        if (data.timeSlots.length === 0) {
                            container.innerHTML = '<div class="col-span-2 text-gray-500 text-center py-8">No available slots for this date</div>';
                            return;
                        }
                        
                        data.timeSlots.forEach(slot => {
                            const button = document.createElement('button');
                            button.type = 'button';
                            button.className = 'time-slot border border-gray-200 rounded-xl px-4 py-3 text-gray-700 hover:border-rose-300 hover:bg-rose-50 transition-all duration-200';
                            button.dataset.slotId = slot.id;
                            button.dataset.slotTime = slot.start_time;
                            button.textContent = slot.start_time.substring(0, 5);
                            
                            button.addEventListener('click', function() {
                                document.querySelectorAll('.time-slot').forEach(btn => {
                                    btn.classList.remove('bg-rose-500', 'text-white', 'border-rose-500');
                                    btn.classList.add('border-gray-200', 'text-gray-700');
                                });
                                this.classList.remove('border-gray-200', 'text-gray-700');
                                this.classList.add('bg-rose-500', 'text-white', 'border-rose-500');
                                selectedTimeSlot = {id: slot.id, time: slot.start_time, date: date};
                                document.getElementById('next-step-2').disabled = false;
                            });
                            
                            container.appendChild(button);
                        });
                    });
            }

            // Payment Selection
            document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    selectedPayment = this.value;
                    document.getElementById('complete-booking').disabled = false;
                });
            });

            // Step Navigation
            function showStep(step) {
                document.querySelectorAll('.step-content').forEach(content => content.classList.add('hidden'));
                document.getElementById(`step-content-${step}`).classList.remove('hidden');
                
                document.querySelectorAll('.step-circle').forEach((circle, index) => {
                    const stepNum = index + 1;
                    if (stepNum <= step) {
                        circle.classList.remove('bg-gray-200', 'text-gray-500');
                        circle.classList.add('bg-rose-500', 'text-white');
                    } else {
                        circle.classList.remove('bg-rose-500', 'text-white');
                        circle.classList.add('bg-gray-200', 'text-gray-500');
                    }
                });
                
                const progressBar = document.getElementById('progress-bar');
                progressBar.style.width = `${((step - 1) / 3) * 100}%`;
                
                // Update step text colors
                document.querySelectorAll('#step-1 span, #step-2 span, #step-3 span, #step-4 span').forEach((span, index) => {
                    if (index + 1 <= step) {
                        span.classList.remove('text-gray-500');
                        span.classList.add('text-gray-900');
                    } else {
                        span.classList.remove('text-gray-900');
                        span.classList.add('text-gray-500');
                    }
                });
                
                currentStep = step;
                
                // Update booking summary on step 4
                if (step === 4) {
                    updateBookingSummary();
                }
            }
            
            function updateBookingSummary() {
                const summaryContainer = document.getElementById('booking-summary');
                let summaryHTML = '';
                
                // Services
                summaryHTML += '<div class="flex justify-between items-center py-2 border-b border-gray-200">';
                summaryHTML += '<span class="text-gray-600">Services:</span>';
                summaryHTML += '<span class="font-medium">' + selectedServices.map(s => s.name).join(', ') + '</span>';
                summaryHTML += '</div>';
                
                // Date & Time
                if (selectedTimeSlot) {
                    summaryHTML += '<div class="flex justify-between items-center py-2 border-b border-gray-200">';
                    summaryHTML += '<span class="text-gray-600">Date & Time:</span>';
                    summaryHTML += '<span class="font-medium">' + new Date(selectedTimeSlot.date).toLocaleDateString() + ' at ' + selectedTimeSlot.time.substring(0, 5) + '</span>';
                    summaryHTML += '</div>';
                }
                
                // Contact Info
                const clientName = document.querySelector('input[name="client_name"]').value;
                const clientPhone = document.querySelector('input[name="client_phone"]').value;
                const clientEmail = document.querySelector('input[name="client_email"]').value;
                
                if (clientName) {
                    summaryHTML += '<div class="flex justify-between items-center py-2 border-b border-gray-200">';
                    summaryHTML += '<span class="text-gray-600">Name:</span>';
                    summaryHTML += '<span class="font-medium">' + clientName + '</span>';
                    summaryHTML += '</div>';
                }
                
                if (clientPhone) {
                    summaryHTML += '<div class="flex justify-between items-center py-2 border-b border-gray-200">';
                    summaryHTML += '<span class="text-gray-600">Phone:</span>';
                    summaryHTML += '<span class="font-medium">' + clientPhone + '</span>';
                    summaryHTML += '</div>';
                }
                
                // Total
                const total = selectedServices.reduce((sum, service) => sum + service.price, 0);
                summaryHTML += '<div class="flex justify-between items-center py-2 font-semibold text-lg">';
                summaryHTML += '<span>Total:</span>';
                summaryHTML += '<span class="text-rose-600">KSh ' + total.toLocaleString() + '</span>';
                summaryHTML += '</div>';
                
                summaryContainer.innerHTML = summaryHTML;
            }

            // Step Navigation Buttons
            document.getElementById('next-step-1').addEventListener('click', () => showStep(2));
            document.getElementById('prev-step-2').addEventListener('click', () => showStep(1));
            document.getElementById('next-step-2').addEventListener('click', () => showStep(3));
            document.getElementById('prev-step-3').addEventListener('click', () => showStep(2));
            document.getElementById('next-step-3').addEventListener('click', () => showStep(4));
            document.getElementById('prev-step-4').addEventListener('click', () => showStep(3));

            // Complete Booking
            document.getElementById('complete-booking').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('booking-form'));
                formData.append('service_ids', JSON.stringify(selectedServices.map(s => s.id)));
                formData.append('time_slot_id', selectedTimeSlot.id);
                formData.append('payment_method', selectedPayment);

                // Show loading state
                this.disabled = true;
                this.textContent = 'Processing...';

                const bookingUrl = '{{ route("booking.store") }}';
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                console.log('Booking URL:', bookingUrl);
                console.log('CSRF Token:', csrfToken);
                console.log('Selected Services:', selectedServices);
                console.log('Selected Time Slot:', selectedTimeSlot);
                console.log('Selected Payment:', selectedPayment);

                fetch(bookingUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    console.log('Response headers:', response.headers);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        window.location.href = `{{ url('/booking/confirmation') }}/${data.booking.id}`;
                    } else {
                        throw new Error(data.message || 'Booking failed');
                    }
                })
                .catch(error => {
                    console.error('Full error:', error);
                    alert('Something went wrong: ' + error.message);
                    this.disabled = false;
                    this.textContent = 'Confirm Booking';
                });
            });
        });
    </script>
</body>
</html>
