<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience Reserved - Jacknails Kenya</title>
    
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
            <!-- Luxury Success Header -->
            <div class="text-center mb-16">
                <div class="w-32 h-32 luxury-gradient rounded-full flex items-center justify-center mx-auto mb-8 luxury-shadow">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <div class="inline-flex items-center px-8 py-4 luxury-glass border border-amber-300/30 rounded-none text-sm font-montserrat font-medium text-gray-700 mb-8 tracking-wider">
                    <div class="w-2 h-2 luxury-gradient rounded-full mr-4"></div>
                    EXPERIENCE RESERVED
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-playfair font-light text-gray-900 mb-8 leading-tight">
                    Reservation
                    <span class="block luxury-text-gradient font-bold italic">Confirmed</span>
                </h1>
                
                <!-- Elegant divider -->
                <div class="flex items-center justify-center space-x-6 mb-8">
                    <div class="w-16 h-px luxury-gradient"></div>
                    <div class="w-4 h-4 luxury-gradient rounded-full"></div>
                    <div class="w-16 h-px luxury-gradient"></div>
                </div>
                
                <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-poppins font-light">
                    Your luxury experience awaits. We look forward to providing you with exceptional service and artistry.
                </p>
            </div>

            <!-- Booking Details Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Booking Information -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Booking Details</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Booking ID:</span>
                                <span class="text-gray-900 font-mono font-medium">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Date & Time:</span>
                                <span class="text-gray-900 font-medium">
                                    {{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }} at {{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Duration:</span>
                                <span class="text-gray-900">{{ $booking->servicesWithDetails->sum('pivot.service_duration_minutes') }} minutes</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="text-gray-600">Status:</span>
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Client Information -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">Client Information</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Name:</span>
                                <span class="text-gray-900">{{ $booking->client_name }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Phone:</span>
                                <span class="text-gray-900">{{ $booking->client_phone }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600">Email:</span>
                                <span class="text-gray-900">{{ $booking->client_email }}</span>
                            </div>
                            @if($booking->notes)
                            <div class="py-3">
                                <span class="text-gray-600 block mb-2">Special Requests:</span>
                                <span class="text-gray-900 text-sm">{{ $booking->notes }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Booked -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Services Booked</h2>
                <div class="space-y-4">
                    @foreach($booking->servicesWithDetails as $service)
                    <div class="flex items-center justify-between py-4 border-b border-gray-100 last:border-b-0">
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-900">{{ $service->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $service->description }}</p>
                            <div class="text-gray-500 text-sm mt-1">{{ $service->pivot->service_duration_minutes }} minutes</div>
                        </div>
                        <div class="text-right">
                            <div class="text-lg font-semibold text-gray-900">KSh {{ number_format($service->pivot->service_price) }}</div>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- Total -->
                    <div class="flex items-center justify-between py-4 border-t-2 border-rose-500 bg-rose-50 rounded-lg px-4 mt-6">
                        <div class="text-lg font-semibold text-gray-900">Total Amount</div>
                        <div class="text-xl font-bold text-rose-600">
                            KSh {{ number_format($booking->total_amount) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Payment Information</h2>
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-gray-900 font-medium">Payment Method: {{ ucfirst($booking->payments->first()->payment_method ?? 'Not specified') }}</div>
                        <div class="text-gray-600 text-sm mt-1">
                            Status: 
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs ml-1 font-medium">
                                {{ ucfirst($booking->payments->first()->status ?? 'Pending') }}
                            </span>
                        </div>
                        @if($booking->payments->first() && $booking->payments->first()->payment_method === 'mpesa')
                        <div class="text-gray-500 text-sm mt-2">
                            You will receive an M-Pesa prompt shortly to complete payment.
                        </div>
                        @endif
                    </div>
                    <div class="text-right">
                        <div class="text-xl font-semibold text-gray-900">
                            KSh {{ number_format($booking->payments->first()->amount ?? $booking->total_amount) }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Next Steps -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">What's Next?</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-14 h-14 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Confirmation Call</h3>
                        <p class="text-gray-600 text-sm">We'll call you 24 hours before your appointment to confirm.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Visit Our Salon</h3>
                        <p class="text-gray-600 text-sm">Arrive 10 minutes early at our salon location.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-14 h-14 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Enjoy Your Service</h3>
                        <p class="text-gray-600 text-sm">Relax and enjoy your premium nail service experience.</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center space-y-4">
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="bg-rose-500 hover:bg-rose-600 text-white px-8 py-3 rounded-xl font-medium transition-colors inline-block">
                        Back to Home
                    </a>
                    <button onclick="window.print()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-3 rounded-xl font-medium transition-colors">
                        Print Confirmation
                    </button>
                </div>
                <p class="text-gray-500 text-sm">
                    Need to make changes? Call us at <a href="tel:+254700000000" class="text-rose-600 hover:underline font-medium">+254 700 000 000</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Floating Contact -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="tel:+254700000000" class="w-12 h-12 bg-rose-500 hover:bg-rose-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
        </a>
    </div>
</body>
</html>
