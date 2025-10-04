<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jacknails Kenya - Premium Nail Salon & Spa</title>
        <meta name="description" content="Kenya's premier nail salon offering professional manicures, pedicures, nail art, and spa services. Book your appointment today!">

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

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
                --luxury-rose: #E8B4B8;
                --luxury-sage: #9CAF88;
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
            
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(1deg); }
            }
            
            @keyframes floatReverse {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(15px) rotate(-1deg); }
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes shimmer {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }
            
            @keyframes sparkle {
                0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
                50% { opacity: 1; transform: scale(1) rotate(180deg); }
            }
            
            @keyframes luxuryGlow {
                0%, 100% { box-shadow: 0 0 20px rgba(212, 175, 55, 0.3), 0 0 40px rgba(236, 72, 153, 0.2); }
                50% { box-shadow: 0 0 40px rgba(212, 175, 55, 0.5), 0 0 80px rgba(236, 72, 153, 0.3); }
            }
            
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            @keyframes textShine {
                0% { background-position: -200% center; }
                100% { background-position: 200% center; }
            }
            
            .animate-float { animation: float 6s ease-in-out infinite; }
            .animate-float-reverse { animation: floatReverse 8s ease-in-out infinite; }
            .animate-fadeInUp { animation: fadeInUp 0.8s ease-out; }
            .animate-sparkle { animation: sparkle 3s ease-in-out infinite; }
            .animate-luxury-glow { animation: luxuryGlow 4s ease-in-out infinite; }
            .animate-gradient { 
                background-size: 200% 200%;
                animation: gradientShift 6s ease infinite;
            }
            .animate-text-shine {
                background: linear-gradient(90deg, #d4af37, #ffd700, #ffb347, #d4af37);
                background-size: 200% 100%;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                animation: textShine 3s ease-in-out infinite;
            }
            
            .shimmer {
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
                background-size: 200% 100%;
                animation: shimmer 2s infinite;
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            
            .luxury-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            }
            
            .gold-gradient {
                background: linear-gradient(135deg, #d4af37 0%, #ffd700 25%, #ffb347 50%, #ff6b9d 75%, #a855f7 100%);
            }
            
            .premium-gradient {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f3460 50%, #533483 75%, #7209b7 100%);
            }
            
            .text-luxury {
                background: linear-gradient(135deg, #d4af37, #ffd700, #ff6b9d, #a855f7);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .luxury-shadow {
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.1);
            }
            
            .premium-card {
                background: linear-gradient(145deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255,255,255,0.2);
            }
        </style>
    </head>
    <body class="font-inter bg-white text-gray-900 antialiased">
        <!-- Luxury Navigation -->
        <nav class="fixed top-0 w-full luxury-glass border-b border-amber-300/20 z-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Luxury Logo -->
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 luxury-gradient rounded-none flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-playfair font-bold text-white">Jacknails</h1>
                            <span class="text-xs text-white/60 tracking-wider">KENYA</span>
                        </div>
                    </div>
                    
                    <!-- Luxury Navigation Links -->
                    <div class="hidden md:flex items-center space-x-12">
                        <a href="#home" class="text-white/90 hover:text-white transition-colors duration-300 font-montserrat font-medium text-sm tracking-wider uppercase relative group">
                            Home
                            <div class="absolute -bottom-2 left-0 w-0 h-px luxury-gradient group-hover:w-full transition-all duration-500"></div>
                        </a>
                        <a href="#services" class="text-white/90 hover:text-white transition-colors duration-300 font-montserrat font-medium text-sm tracking-wider uppercase relative group">
                            Services
                            <div class="absolute -bottom-2 left-0 w-0 h-px luxury-gradient group-hover:w-full transition-all duration-500"></div>
                        </a>
                        <a href="#gallery" class="text-white/90 hover:text-white transition-colors duration-300 font-montserrat font-medium text-sm tracking-wider uppercase relative group">
                            Gallery
                            <div class="absolute -bottom-2 left-0 w-0 h-px luxury-gradient group-hover:w-full transition-all duration-500"></div>
                        </a>
                        <a href="#testimonials" class="text-white/90 hover:text-white transition-colors duration-300 font-montserrat font-medium text-sm tracking-wider uppercase relative group">
                            Reviews
                            <div class="absolute -bottom-2 left-0 w-0 h-px luxury-gradient group-hover:w-full transition-all duration-500"></div>
                        </a>
                        <a href="#contact" class="text-white/90 hover:text-white transition-colors duration-300 font-montserrat font-medium text-sm tracking-wider uppercase relative group">
                            Contact
                            <div class="absolute -bottom-2 left-0 w-0 h-px luxury-gradient group-hover:w-full transition-all duration-500"></div>
                        </a>
                    </div>
                    
                    <!-- CTA & Auth -->
                    <div class="hidden md:flex items-center space-x-4">
                        <!-- @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-white/80 hover:text-white transition-colors duration-200 text-sm font-medium">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-white/80 hover:text-white transition-colors duration-200 text-sm font-medium">
                                    Login
                                </a>
                            @endauth
                        @endif -->
                        <a href="{{ route('booking.index') }}" class="luxury-gradient text-white px-8 py-3 font-montserrat font-medium text-sm tracking-wider uppercase luxury-shadow hover:luxury-shadow-hover transition-all duration-500 transform hover:-translate-y-1">
                            Reserve
                        </a>
                    </div>
                    
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-white/80 hover:text-white transition-colors duration-200 p-2">
                            <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Menu -->
                <div id="mobile-menu" class="md:hidden hidden bg-black/40 backdrop-blur-xl border-t border-white/10">
                    <div class="px-4 py-6 space-y-4">
                        <a href="#home" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                            Home
                        </a>
                        <a href="#services" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                            Services
                        </a>
                        <a href="#gallery" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                            Gallery
                        </a>
                        <a href="#testimonials" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                            Reviews
                        </a>
                        <a href="#contact" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                            Contact
                        </a>
                        <div class="pt-4 border-t border-white/20 space-y-3">
                            <!-- @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                                        Login
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="block text-white/80 hover:text-white transition-colors duration-200 font-medium py-2">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            @endif -->
                            <a href="{{ route('booking.index') }}" class="block w-full bg-gradient-to-r from-rose-500 to-purple-600 text-white px-6 py-3 rounded-full text-center font-semibold">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Luxury Hero Section -->
        <section id="home" class="relative min-h-screen flex items-center overflow-hidden" style="background: linear-gradient(135deg, #2C2C2C 0%, #1a1a1a 50%, #2C2C2C 100%);">
            <!-- Elegant Background Elements -->
            <div class="absolute inset-0">
                <!-- Luxury gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-amber-50/5 via-transparent to-amber-100/5"></div>
                
                <!-- Sophisticated geometric patterns -->
                <div class="absolute top-1/4 right-1/4 w-96 h-96 opacity-10">
                    <div class="w-full h-full border border-amber-300 rounded-full animate-pulse"></div>
                </div>
                <div class="absolute bottom-1/4 left-1/4 w-64 h-64 opacity-5">
                    <div class="w-full h-full border-2 border-amber-400 rotate-45 animate-pulse" style="animation-delay: 1s;"></div>
                </div>
                
                <!-- Subtle light rays -->
                <div class="absolute top-0 left-1/2 w-px h-full bg-gradient-to-b from-transparent via-amber-300/20 to-transparent transform -translate-x-1/2"></div>
            </div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-20">
                <div class="grid lg:grid-cols-2 gap-20 items-center">
                    <!-- Content Column -->
                    <div class="space-y-10 text-center lg:text-left">
                        <!-- Luxury Badge -->
                        <div class="inline-flex items-center px-6 py-3 luxury-glass rounded-full text-sm font-montserrat font-medium text-white/90 tracking-wider">
                            <div class="w-2 h-2 luxury-gradient rounded-full mr-3 animate-pulse"></div>
                            KENYA'S PREMIER LUXURY SALON
                        </div>
                        
                        <!-- Elegant Heading -->
                        <div class="space-y-8">
                            <h1 class="text-6xl sm:text-7xl lg:text-8xl xl:text-9xl font-playfair font-light text-white leading-none tracking-tight">
                                <span class="block font-extralight">Jacknails</span>
                                <span class="block luxury-text-gradient font-bold italic">Kenya</span>
                            </h1>
                            
                            <!-- Elegant divider -->
                            <div class="flex items-center justify-center lg:justify-start space-x-4">
                                <div class="w-12 h-px luxury-gradient"></div>
                                <div class="w-3 h-3 luxury-gradient rounded-full"></div>
                                <div class="w-12 h-px luxury-gradient"></div>
                            </div>
                            
                            <p class="text-xl lg:text-2xl text-white/70 leading-relaxed max-w-2xl mx-auto lg:mx-0 font-poppins font-light tracking-wide">
                                Where artistry meets elegance. Experience bespoke nail care in Kenya's most sophisticated beauty sanctuary.
                            </p>
                        </div>
                        
                        <!-- Luxury CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start pt-8">
                            <a href="{{ route('booking.index') }}" class="group relative luxury-gradient text-white px-10 py-5 rounded-none font-montserrat font-medium text-lg tracking-wider uppercase luxury-shadow hover:luxury-shadow-hover transition-all duration-500 transform hover:-translate-y-1">
                                <span class="flex items-center justify-center">
                                    Reserve Experience
                                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            </a>
                            <a href="#gallery" class="group luxury-glass text-white px-10 py-5 rounded-none font-montserrat font-medium text-lg tracking-wider uppercase hover:bg-white/20 transition-all duration-500 transform hover:-translate-y-1">
                                <span class="flex items-center justify-center">
                                    Explore Gallery
                                    <svg class="w-5 h-5 ml-3 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        
                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-8 pt-12">
                            <div class="text-center">
                                <div class="text-3xl lg:text-4xl font-playfair font-bold text-white mb-2">1000+</div>
                                <div class="text-white/60 text-sm font-medium">Happy Clients</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl lg:text-4xl font-playfair font-bold text-white mb-2">5.0</div>
                                <div class="text-white/60 text-sm font-medium">Rating</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl lg:text-4xl font-playfair font-bold text-white mb-2">7+</div>
                                <div class="text-white/60 text-sm font-medium">Years</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Luxury Visual Column -->
                    <div class="relative hidden lg:block">
                        <!-- Elegant Image Container -->
                        <div class="relative group">
                            <!-- Luxury glow effect -->
                            <div class="absolute inset-0 luxury-gradient opacity-20 rounded-none blur-3xl group-hover:opacity-30 transition-all duration-700"></div>
                            
                            <!-- Main showcase -->
                            <div class="relative luxury-glass border border-amber-300/20 p-4 hover:border-amber-300/40 transition-all duration-700">
                                <div class="aspect-[3/4] relative overflow-hidden rounded-lg">
                                    <img src="{{ asset('images/image1.jpeg') }}" alt="Jacknails Kenya - Premium Nail Art" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    <div class="absolute bottom-6 left-6 text-white">
                                        <p class="text-2xl font-playfair font-light mb-2">Artistry</p>
                                        <p class="text-white/80 font-poppins text-sm tracking-wider">REDEFINED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-8 -right-8 luxury-glass border border-amber-300/30 rounded-full p-6">
                            <div class="flex items-center justify-center">
                                <div class="w-4 h-4 luxury-gradient rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        
                        <div class="absolute -bottom-8 -left-8 luxury-glass border border-amber-300/30 p-4">
                            <div class="text-center">
                                <div class="text-2xl font-playfair font-bold luxury-text-gradient">5★</div>
                                <div class="text-white/60 text-xs font-montserrat tracking-wider">RATED</div>
                            </div>
                        </div>
                        
                        <div class="absolute -bottom-6 -left-6 bg-gradient-to-r from-rose-500 to-purple-600 text-white rounded-2xl p-6">
                            <div class="text-2xl font-playfair font-bold">From KSh 1,500</div>
                            <div class="text-rose-100 text-sm">Premium Services</div>
                        </div>
                        
                        <div class="absolute top-1/2 -right-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl p-4">
                            <div class="text-center">
                                <div class="text-xl font-playfair font-bold text-white">24/7</div>
                                <div class="text-white/60 text-xs">Booking</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Scroll Indicator -->
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-center">
                    <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center mb-2">
                        <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
                    </div>
                    <p class="text-white/40 text-xs">Scroll to explore</p>
                </div>
            </div>
        </section>
        
        <!-- Luxury Features Section -->
        <section class="py-16 md:py-24 premium-gradient relative overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-10 right-10 md:top-20 md:right-20 w-32 h-32 md:w-64 md:h-64 bg-gradient-to-br from-yellow-400/10 to-pink-400/10 rounded-full blur-2xl md:blur-3xl animate-float"></div>
                <div class="absolute bottom-10 left-10 md:bottom-20 md:left-20 w-40 h-40 md:w-80 md:h-80 bg-gradient-to-br from-purple-400/10 to-indigo-400/10 rounded-full blur-2xl md:blur-3xl animate-float-reverse"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-12 md:mb-16">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-playfair font-bold text-white mb-4">
                        Why Choose <span class="text-luxury animate-gradient">Jacknails Kenya</span>
                    </h2>
                    <div class="w-24 md:w-32 h-0.5 md:h-1 bg-gradient-to-r from-transparent via-yellow-400 to-transparent mx-auto mb-6"></div>
                    <p class="text-lg md:text-xl text-white/80 max-w-3xl mx-auto font-inter">
                        Experience the pinnacle of luxury nail care with our exclusive services and premium amenities.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Premium Products -->
                    <div class="group text-center p-6 md:p-8 premium-card rounded-2xl md:rounded-3xl luxury-shadow hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-luxury-glow">
                        <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 md:mb-6 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl md:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-playfair font-bold text-white mb-3">Premium Products</h3>
                        <p class="text-white/70 text-sm md:text-base font-inter">Only the finest international brands and luxury nail care products for exceptional results.</p>
                    </div>
                    
                    <!-- Expert Artists -->
                    <div class="group text-center p-6 md:p-8 premium-card rounded-2xl md:rounded-3xl luxury-shadow hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-luxury-glow" style="animation-delay: 0.2s;">
                        <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 md:mb-6 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl md:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-playfair font-bold text-white mb-3">Expert Artists</h3>
                        <p class="text-white/70 text-sm md:text-base font-inter">Certified nail technicians with years of experience in luxury nail art and design.</p>
                    </div>
                    
                    <!-- Hygiene Standards -->
                    <div class="group text-center p-6 md:p-8 premium-card rounded-2xl md:rounded-3xl luxury-shadow hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-luxury-glow" style="animation-delay: 0.4s;">
                        <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 md:mb-6 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl md:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-playfair font-bold text-white mb-3">Hygiene Excellence</h3>
                        <p class="text-white/70 text-sm md:text-base font-inter">Hospital-grade sterilization and the highest safety standards for your peace of mind.</p>
                    </div>
                    
                    <!-- Luxury Experience -->
                    <div class="group text-center p-6 md:p-8 premium-card rounded-2xl md:rounded-3xl luxury-shadow hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 animate-luxury-glow" style="animation-delay: 0.6s;">
                        <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 md:mb-6 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl md:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg md:text-xl font-playfair font-bold text-white mb-3">Luxury Ambiance</h3>
                        <p class="text-white/70 text-sm md:text-base font-inter">Relax in our beautifully designed salon with premium amenities and personalized service.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Luxury Services Section -->
        <section id="services" class="py-24 md:py-32 relative overflow-hidden" style="background: linear-gradient(180deg, var(--luxury-cream) 0%, #ffffff 100%);">
            <!-- Elegant Background Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-1/4 left-1/4 w-px h-96 bg-gradient-to-b from-transparent via-amber-300/20 to-transparent"></div>
                <div class="absolute bottom-1/4 right-1/4 w-96 h-px bg-gradient-to-r from-transparent via-amber-300/20 to-transparent"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
                <!-- Luxury Header -->
                <div class="text-center mb-20 md:mb-32">
                    <div class="inline-flex items-center px-8 py-4 luxury-glass border border-amber-300/30 rounded-none text-sm font-montserrat font-medium text-gray-700 mb-8 tracking-wider">
                        <div class="w-2 h-2 luxury-gradient rounded-full mr-4"></div>
                        SIGNATURE EXPERIENCES
                    </div>
                    
                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-playfair font-light text-gray-900 mb-8 leading-tight">
                        
                        <span class="block luxury-text-gradient font-bold italic">Services</span>
                    </h2>
                    
                    <!-- Elegant divider -->
                    <div class="flex items-center justify-center space-x-6 mb-8">
                        <div class="w-16 h-px luxury-gradient"></div>
                        <div class="w-4 h-4 luxury-gradient rounded-full"></div>
                        <div class="w-16 h-px luxury-gradient"></div>
                    </div>
                    
                    <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-poppins font-light">
                        Each service is meticulously crafted to deliver an unparalleled experience of luxury, precision, and artistry.
                    </p>
                </div>
                
                <!-- Luxury Service Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-12">
                    @forelse($services as $index => $service)
                        <div class="group relative bg-white luxury-shadow hover:luxury-shadow-hover transition-all duration-700 hover:-translate-y-2 border border-gray-100 hover:border-amber-200">
                            <!-- Luxury Service Image -->
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                
                                <!-- Luxury overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent group-hover:from-black/30 transition-all duration-700"></div>
                                
                                <!-- Price badge -->
                                <div class="absolute top-6 right-6">
                                    <div class="luxury-gradient text-white px-4 py-2 text-sm font-montserrat font-medium tracking-wider">
                                        {{ $service->formatted_price }}
                                    </div>
                                </div>
                                
                                @if($service->is_popular)
                                    <div class="absolute top-6 left-6">
                                        <div class="luxury-glass border border-amber-300/50 text-white px-3 py-1 text-xs font-montserrat font-medium tracking-wider">
                                            ★ SIGNATURE
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Luxury Service Content -->
                            <div class="p-8">
                                <div class="text-center space-y-6">
                                    <h3 class="text-2xl font-playfair font-bold text-gray-900 group-hover:luxury-text-gradient transition-all duration-500">
                                        {{ $service->name }}
                                    </h3>
                                    
                                    <p class="text-gray-600 leading-relaxed font-poppins font-light">
                                        {{ Str::limit($service->description, 80) }}
                                    </p>
                                    
                                    <!-- Service details -->
                                    <div class="flex items-center justify-center space-x-6 text-sm text-gray-500 font-montserrat">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $service->formatted_duration }}
                                        </div>
                                    </div>
                                    
                                    <!-- Luxury CTA -->
                                    <div class="pt-4">
                                        <a href="{{ route('booking.index') }}" class="inline-flex items-center luxury-glass border border-amber-300/30 text-gray-700 px-6 py-3 font-montserrat font-medium text-sm tracking-wider uppercase hover:luxury-gradient hover:text-white hover:border-transparent transition-all duration-500 group-hover:-translate-y-1">
                                            Select Service
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20">
                            <div class="w-24 h-24 luxury-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                </svg>
                            </div>
                            <p class="text-2xl font-playfair font-light text-gray-600 mb-4">Services Coming Soon</p>
                            <p class="text-gray-500 font-poppins">Our luxury experiences are being curated for you.</p>
                        </div>
                    @endforelse
                </div>
                
                <!-- Luxury CTA Section -->
                <div class="text-center mt-20 md:mt-32">
                    <div class="space-y-8">
                        <a href="{{ route('booking.index') }}" class="group inline-flex items-center luxury-gradient text-white px-12 py-6 font-montserrat font-medium text-lg tracking-wider uppercase luxury-shadow hover:luxury-shadow-hover transition-all duration-700 transform hover:-translate-y-2">
                            <span class="flex items-center">
                                Reserve Your Experience
                                <svg class="w-6 h-6 ml-4 group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </span>
                        </a>
                        
                        <div class="flex items-center justify-center space-x-4 text-gray-600 font-poppins">
                            <div class="w-2 h-2 luxury-gradient rounded-full"></div>
                            <p class="text-lg">Complimentary consultation with every service</p>
                            <div class="w-2 h-2 luxury-gradient rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Gallery Section -->
        <section id="gallery" class="py-20 bg-gradient-to-br from-pink-50 to-purple-50 relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full opacity-20 animate-float"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-20">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-100 to-purple-100 rounded-full text-sm font-medium text-pink-700 mb-6">
                        🎨 Portfolio Showcase
                    </div>
                    <h2 class="text-5xl font-cormorant font-bold text-gray-900 mb-6">
                        Masterpiece <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">Gallery</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        Witness the artistry and precision that defines our work. Each creation tells a story of elegance, creativity, and uncompromising quality.
                    </p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Image 1 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image1.jpeg') }}" alt="Luxury nail art design" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Luxury Design</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 2 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image2.jpeg') }}" alt="Elegant manicure" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Classic Elegance</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 3 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image3.jpeg') }}" alt="Creative nail design" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Creative Art</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 4 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image4.jpeg') }}" alt="Luxury spa pedicure" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Spa Experience</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 5 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image5.jpeg') }}" alt="Premium acrylic extensions" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Extensions</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 6 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image6.jpeg') }}" alt="Premium gel manicure" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Gel Polish</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 7 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image7.jpeg') }}" alt="Classic French manicure" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">French Classic</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 8 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image8.jpeg') }}" alt="Bridal nail design" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Bridal Special</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 9 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image9.jpeg') }}" alt="Artistic nail design" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Artistic Design</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 10 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image10.jpeg') }}" alt="Premium nail care" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Premium Care</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 11 -->
                    <div class="group aspect-square bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative overflow-hidden h-full">
                            <img src="{{ asset('images/image11.jpeg') }}" alt="Signature nail art" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="font-semibold">Signature Art</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-16">
                    <button class="group relative bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-5 rounded-full hover:shadow-2xl transition-all duration-300 font-semibold text-xl overflow-hidden">
                        <span class="relative z-10">Explore Full Portfolio</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    <p class="text-gray-600 mt-4 text-lg">📸 Follow us on Instagram for daily inspiration</p>
                </div>
            </div>
        </section>
        
        <!-- Testimonials Section -->
        <section id="testimonials" class="py-20 bg-white relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-pink-100 to-purple-100 rounded-full opacity-30 transform -translate-x-1/2 -translate-y-1/2"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-20">
                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-100 to-purple-100 rounded-full text-sm font-medium text-pink-700 mb-6">
                        💬 Client Stories
                    </div>
                    <h2 class="text-5xl font-cormorant font-bold text-gray-900 mb-6">
                        Voices of <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">Satisfaction</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        Discover why our clients choose us time and again. Their stories of transformation and delight speak to our commitment to excellence.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-8 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "Absolutely amazing service! The nail art was beyond my expectations and the staff was so professional and friendly. I'll definitely be coming back!"
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                                <span class="text-pink-600 font-semibold">AM</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">Aisha Mwangi</h4>
                                <p class="text-gray-600 text-sm">Regular Client</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-8 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "The gel manicure lasted for weeks without chipping! Great value for money and such a relaxing atmosphere. Highly recommend!"
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                                <span class="text-pink-600 font-semibold">GK</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">Grace Kamau</h4>
                                <p class="text-gray-600 text-sm">VIP Client</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-8 shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "Perfect for special occasions! They created the most beautiful bridal nails for my wedding. Everyone was asking where I got them done!"
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                                <span class="text-pink-600 font-semibold">MO</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-gray-900">Mary Ochieng</h4>
                                <p class="text-gray-600 text-sm">Bridal Client</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gradient-to-br from-pink-600 to-purple-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-playfair font-bold text-white mb-4">
                        Book Your Appointment Today
                    </h2>
                    <p class="text-xl text-pink-100 max-w-3xl mx-auto">
                        Ready to treat yourself? Get in touch with us to schedule your perfect nail experience.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="bg-white rounded-2xl p-8 shadow-xl">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-6">Send us a Message</h3>
                        <form class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="Your full name">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="your.email@example.com">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="+254 700 000 000">
                            </div>
                            <div>
                                <label for="service" class="block text-sm font-medium text-gray-700 mb-2">Preferred Service</label>
                                <select id="service" name="service" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                                    <option value="">Select a service</option>
                                    <option value="classic-manicure">Classic Manicure</option>
                                    <option value="gel-manicure">Gel Manicure</option>
                                    <option value="acrylic-nails">Acrylic Nails</option>
                                    <option value="nail-art">Custom Nail Art</option>
                                    <option value="pedicure">Luxury Pedicure</option>
                                    <option value="bridal-package">Bridal Package</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="Tell us about your preferred appointment time and any special requests..."></textarea>
                            </div>
                            <button type="submit" class="w-full bg-pink-600 text-white py-3 px-6 rounded-lg hover:bg-pink-700 transition-colors font-semibold text-lg">
                                Send Message
                            </button>
                        </form>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                            <h3 class="text-2xl font-semibold text-white mb-6">Visit Our Salon</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <svg class="w-6 h-6 text-pink-200 mt-1 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="text-white font-semibold">Address</h4>
                                        <p class="text-pink-100">123 Beauty Street, Nairobi, Kenya</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-6 h-6 text-pink-200 mt-1 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="text-white font-semibold">Phone</h4>
                                        <p class="text-pink-100">+254 700 123 456</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-6 h-6 text-pink-200 mt-1 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div>
                                        <h4 class="text-white font-semibold">Email</h4>
                                        <p class="text-pink-100">hello@jacknailskenya.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                            <h3 class="text-2xl font-semibold text-white mb-6">Opening Hours</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-pink-100">Monday - Friday</span>
                                    <span class="text-white font-semibold">9:00 AM - 7:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-pink-100">Saturday</span>
                                    <span class="text-white font-semibold">8:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-pink-100">Sunday</span>
                                    <span class="text-white font-semibold">10:00 AM - 5:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div class="space-y-4">
                        <h3 class="text-2xl font-playfair font-bold text-pink-400">Jacknails Kenya</h3>
                        <p class="text-gray-300">
                            Your premier destination for beautiful, professional nail care in Nairobi. We bring artistry and excellence to every service.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-pink-400 hover:text-pink-300 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-pink-400 hover:text-pink-300 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-pink-400 hover:text-pink-300 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.120.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z.017-.001z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-pink-400 hover:text-pink-300 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-pink-400">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="#home" class="text-gray-300 hover:text-pink-400 transition-colors">Home</a></li>
                            <li><a href="#services" class="text-gray-300 hover:text-pink-400 transition-colors">Services</a></li>
                            <li><a href="#gallery" class="text-gray-300 hover:text-pink-400 transition-colors">Gallery</a></li>
                            <li><a href="#testimonials" class="text-gray-300 hover:text-pink-400 transition-colors">Reviews</a></li>
                            <li><a href="#contact" class="text-gray-300 hover:text-pink-400 transition-colors">Contact</a></li>
                            <li><a href="{{ route('booking.index') }}" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg transition-all duration-300 inline-block">Book Now</a></li>
                        </ul>
                    </div>
                    
                    <!-- Services -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-pink-400">Our Services</h4>
                        <ul class="space-y-2">
                            @foreach($services->take(4) as $service)
                                <li><a href="#services" class="text-gray-300 hover:text-pink-400 transition-colors">{{ $service->name }}</a></li>
                            @endforeach
                            @if($services->count() > 4)
                                <li><a href="#services" class="text-pink-400 hover:text-pink-300 transition-colors font-medium">View All Services →</a></li>
                            @endif
                        </ul>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-pink-400">Contact Info</h4>
                        <div class="space-y-2">
                            <p class="text-gray-300 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                123 Beauty Street, Nairobi
                            </p>
                            <p class="text-gray-300 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                +254 700 123 456
                            </p>
                            <p class="text-gray-300 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                hello@jacknailskenya.com
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-12 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 text-sm">
                            © 2024 Jacknails Kenya. All rights reserved.
                        </p>
                        <div class="flex space-x-6 mt-4 md:mt-0">
                            <a href="#" class="text-gray-400 hover:text-pink-400 text-sm transition-colors">Privacy Policy</a>
                            <a href="#" class="text-gray-400 hover:text-pink-400 text-sm transition-colors">Terms of Service</a>
                            <a href="#" class="text-gray-400 hover:text-pink-400 text-sm transition-colors">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Mobile Menu JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                const menuIcon = document.getElementById('menu-icon');
                const closeIcon = document.getElementById('close-icon');

                if (mobileMenuButton && mobileMenu) {
                    mobileMenuButton.addEventListener('click', function() {
                        const isHidden = mobileMenu.classList.contains('hidden');
                        
                        if (isHidden) {
                            mobileMenu.classList.remove('hidden');
                            menuIcon.classList.add('hidden');
                            closeIcon.classList.remove('hidden');
                        } else {
                            mobileMenu.classList.add('hidden');
                            menuIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        }
                    });

                    // Close mobile menu when clicking on links
                    const mobileLinks = mobileMenu.querySelectorAll('a[href^="#"]');
                    mobileLinks.forEach(link => {
                        link.addEventListener('click', function() {
                            mobileMenu.classList.add('hidden');
                            menuIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        });
                    });

                    // Close mobile menu when clicking outside
                    document.addEventListener('click', function(event) {
                        if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                            mobileMenu.classList.add('hidden');
                            menuIcon.classList.remove('hidden');
                            closeIcon.classList.add('hidden');
                        }
                    });
                }

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                            window.scrollTo({
                                top: offsetTop,
                                behavior: 'smooth'
                            });
                        }
                    });
                });

                // Add scroll effect to navbar
                const navbar = document.querySelector('nav');
                if (navbar) {
                    window.addEventListener('scroll', function() {
                        if (window.scrollY > 50) {
                            navbar.classList.add('backdrop-blur-xl');
                            navbar.style.background = 'rgba(255, 255, 255, 0.1)';
                        } else {
                            navbar.classList.remove('backdrop-blur-xl');
                            navbar.style.background = 'rgba(255, 255, 255, 0.05)';
                        }
                    });
                }
            });
        </script>
    </body>
</html>
