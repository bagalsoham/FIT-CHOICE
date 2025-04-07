<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-black text-gray-100 font-sans leading-relaxed">

@extends('layouts.user')

@section('content-user')
    <div class="container mx-auto px-4 py-10 max-w-7xl">

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Memberships Section -->
        <section id="memberships" class="mb-12">
            <h2 class="text-2xl font-extrabold text-white mb-6">Your Memberships</h2>
            <div class="p-6 rounded-lg shadow-lg">

                @auth
                    @php
                        $cardDetails = [
                            'ELITE' => [
                                'imageSrc' => asset('images/card1.png'),
                                'cardSubtitle' => 'fitpass',
                                'bulletPoints' => [
                                    'At-center group classes',
                                    'All ELITE & PRO gyms',
                                    'At-home live workouts'
                                ]
                            ],
                            'PRO' => [
                                'imageSrc' => asset('images/card2.png'),
                                'cardSubtitle' => 'fitpass',
                                'bulletPoints' => [
                                    'All PRO gyms',
                                    '2 Sessions/month at ELITE gyms & group classes',
                                    'At-home live workouts'
                                ]
                            ],
                            'SELECT' => [
                                'imageSrc' => asset('images/card3.png'),
                                'cardSubtitle' => 'fitpass',
                                'bulletPoints' => [
                                    'One center that you choose',
                                    'Limited sessions* in other centers & gyms in your city',
                                    'At-home live workouts'
                                ]
                            ]
                        ];
                    @endphp

                    @if(isset($activePlan))
                        @php
                            $planName = strtoupper($activePlan->plan_name);
                            $features = json_decode($activePlan->features, true);
                            $currentCard = $cardDetails[$planName] ?? $cardDetails['SELECT'];
                            $bulletPoints = is_array($features) ? $features : $currentCard['bulletPoints'];
                        @endphp

                        <div class="flex justify-center">
                            @include('layouts.card', [
                                'imageSrc' => $currentCard['imageSrc'],
                                'imageAlt' => $planName . ' workout',
                                'cardSubtitle' => $currentCard['cardSubtitle'],
                                'cardTitle' => $planName,
                                'headingText' => 'Unlimited access to',
                                'bulletPoints' => $bulletPoints,
                                'primaryButtonText' => 'ACTIVE PLAN',
                                'secondaryButtonText' => 'MANAGE PLAN'
                            ])
                        </div>

                        <div class="mt-6 text-center">
                            <p class="text-gray-400">
                                Your <span class="font-semibold">{{ $planName }}</span> plan has been active since 
                                <span class="font-medium">{{ \Carbon\Carbon::parse($activePlan->created_at)->format('F d, Y') }}</span>
                            </p>
                        </div>

                    @else
                        <div class="text-center py-8">
                            <h3 class="text-2xl font-semibold mb-4 text-white">No Active Membership</h3>
                            <p class="text-gray-400 mb-6">You currently don't have any active membership plan. Choose one of our plans below to get started.</p>

                            <div class="flex flex-wrap justify-center gap-6">
                                @foreach (['ELITE', 'PRO', 'SELECT'] as $plan)
                                    <div class="w-full max-w-xs">
                                        @include('layouts.card', [
                                            'imageSrc' => asset("images/card" . ($loop->index + 1) . ".png"),
                                            'imageAlt' => $plan . ' workout',
                                            'cardSubtitle' => 'fitpass',
                                            'cardTitle' => $plan,
                                            'headingText' => 'Unlimited access to',
                                            'bulletPoints' => $cardDetails[$plan]['bulletPoints'],
                                            'primaryButtonText' => 'TRY FOR FREE',
                                            'primaryButtonUrl' => "#subscribe-{$plan}",
                                            'secondaryButtonText' => 'LEARN MORE',
                                            'secondaryButtonUrl' => "#{$plan}-details"
                                        ])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @else
                    <div class="text-center py-8">
                        <h3 class="text-2xl font-semibold mb-4 text-white">Please Log In</h3>
                        <p class="text-gray-400 mb-6">You need to be logged in to view your membership details.</p>
                        <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-gray-700 hover:bg-gray-600 transition text-white font-medium rounded-lg">Log In</a>
                    </div>
                @endauth
            </div>
        </section>

        <!-- Payment History Section -->
        @if(isset($payments) && count($payments) > 0 && auth()->check())
            <section id="payment-history" class="rounded-lg p-6 mx-auto max-w-7xl shadow-lg mb-12">
                @include('user.payment-history')
            </section>
        @endif

    </div>

    <!-- Payment Modal -->
    @auth
        @include('layouts.payment-modal')
    @endauth

    <!-- Workout Progress Section -->
    @include('user.workout-progress')

@endsection

</body>
</html>
