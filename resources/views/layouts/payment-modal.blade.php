<!-- Payment Modal -->
<div id="paymentModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white dark:bg-gray-800 w-full max-w-md mx-auto rounded-lg shadow-lg p-6">
            <!-- Close button -->
            <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Modal content -->
            <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">Subscribe to <span id="planNameDisplay">PLAN</span></h2>
            
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                    <span class="text-gray-700 dark:text-gray-300">Plan:</span>
                    <span class="font-semibold text-gray-900 dark:text-white" id="planDetailName">Plan Name</span>
                </div>
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                    <span class="text-gray-700 dark:text-gray-300">Duration:</span>
                    <span class="font-semibold text-gray-900 dark:text-white">1 Month</span>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-700 dark:text-gray-300">Price:</span>
                    <span class="font-semibold text-gray-900 dark:text-white" id="planPrice">$0.00</span>
                </div>
            </div>
            
            <form id="paymentForm" action="{{ route('payment.process') }}" method="POST">
                @csrf
                <input type="hidden" name="plan_name" id="planName" value="">
                <input type="hidden" name="amount" id="amount" value="">
                
                <!-- Simulated payment form -->
                <div class="mb-6">
                    <label for="cardNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Card Number</label>
                    <input type="text" id="cardNumber" placeholder="4242 4242 4242 4242" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" maxlength="19">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">This is a demo. Use any card number.</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="expiry" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Expiry Date</label>
                        <input type="text" id="expiry" placeholder="MM/YY" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" maxlength="5">
                    </div>
                    <div>
                        <label for="cvv" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CVV</label>
                        <input type="text" id="cvv" placeholder="123" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" maxlength="3">
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                    Pay Now
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Plan pricing data
    const planPrices = {
        'ELITE': 99.99,
        'PRO': 69.99,
        'SELECT': 49.99
    };

    // Format currency
    function formatCurrency(amount) {
        return '$' + parseFloat(amount).toFixed(2);
    }

    // Open modal with plan details
    function openPaymentModal(planName) {
        const modal = document.getElementById('paymentModal');
        const planNameDisplay = document.getElementById('planNameDisplay');
        const planDetailName = document.getElementById('planDetailName');
        const planPrice = document.getElementById('planPrice');
        const planNameInput = document.getElementById('planName');
        const amountInput = document.getElementById('amount');
        
        // Set the plan details
        planNameDisplay.textContent = planName;
        planDetailName.textContent = planName + ' PLAN';
        const price = planPrices[planName] || 0;
        planPrice.textContent = formatCurrency(price);
        
        // Set form values
        planNameInput.value = planName;
        amountInput.value = price;
        
        // Show modal
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    // Close modal
    function closePaymentModal() {
        const modal = document.getElementById('paymentModal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Format card number with spaces
    function formatCardNumber(e) {
        const input = e.target;
        let value = input.value.replace(/\s+/g, '');
        value = value.replace(/[^0-9]/gi, '');
        
        const parts = [];
        for (let i = 0; i < value.length; i += 4) {
            parts.push(value.substring(i, i + 4));
        }
        
        input.value = parts.join(' ');
    }

    // Format expiry date
    function formatExpiry(e) {
        const input = e.target;
        let value = input.value.replace(/\s+/g, '');
        value = value.replace(/[^0-9]/gi, '');
        
        if (value.length > 2) {
            input.value = value.substring(0, 2) + '/' + value.substring(2);
        } else {
            input.value = value;
        }
    }

    // Setup event listeners when the DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Get all elements with IDs that start with "subscribe-"
        const subscribeButtons = document.querySelectorAll('[id^="subscribe-"]');
        
        // Add click event listener to each subscribe button/link
        subscribeButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const planId = this.id.replace('subscribe-', '').toUpperCase();
                openPaymentModal(planId);
            });
        });
        
        // Close modal when clicking the close button
        document.getElementById('closeModal').addEventListener('click', closePaymentModal);
        
        // Close modal when clicking outside the modal content
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePaymentModal();
            }
        });
        
        // Format card inputs
        const cardNumberInput = document.getElementById('cardNumber');
        if (cardNumberInput) {
            cardNumberInput.addEventListener('input', formatCardNumber);
        }
        
        const expiryInput = document.getElementById('expiry');
        if (expiryInput) {
            expiryInput.addEventListener('input', formatExpiry);
        }
    });
</script>