<section id="payment-history" class="bg-black max-w-6xl p-4 mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Payment History</h2>
    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow">
        @if(count($payments) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-900">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                            <th class="py-3 px-4 text-left">Date</th>
                            <th class="py-3 px-4 text-left">Plan</th>
                            <th class="py-3 px-4 text-left">Amount</th>
                            <th class="py-3 px-4 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}
                                </td>
                                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">
                                    {{ strtoupper($payment->plan_name) }}
                                </td>
                                <td class="py-3 px-4 text-gray-700 dark:text-gray-300">
                                    ${{ number_format($payment->amount, 2) }}
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $payment->payment_status === 'success' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                        {{ ucfirst($payment->payment_status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-6">
                <p class="text-gray-600 dark:text-gray-400">No payment history found.</p>
            </div>
        @endif
    </div>
</section>