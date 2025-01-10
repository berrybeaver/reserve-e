document.addEventListener('DOMContentLoaded', function () {
    const redeemButtons = document.querySelectorAll('.redeem-button');

    redeemButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const couponId = this.dataset.couponId; // Retrieve coupon ID from data attribute
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch('/redeem/coupon', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ coupon_id: couponId }),
                });

                const data = await response.json(); // Parse JSON response

                if (response.ok) {
                    alert(data.message); // Show success message
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert(data.message || 'An error occurred.'); // Show error message
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An unexpected error occurred. Please try again.');
            }
        });
    });
});
