<x-filament-panels::page>
    <script src="https://app{{ config('midtrans.is_production') ? '' : '.sandbox' }}.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openSnapPayment', (token) => {
                window.snap.pay(token[0], {
                    onSuccess: function(result) {
                        @this.handlePaymentSuccess(result);
                    },
                    onPending: function(result) {
                        console.log('Payment pending', result);
                    },
                    onError: function(result) {
                        console.log('Payment error', result);
                    },
                    onClose: function() {
                        console.log('Customer closed the popup');
                    }
                });
            });

            Livewire.on('paymentSuccess', (data) => {
                setTimeout(() => {
                    const payload = data[0];
                    if (payload && payload.redirect) {
                        window.location.href = payload.redirect;
                    }
                }, 2000);
            });
        });
    </script>

    {{ $this->table }}
</x-filament-panels::page>
