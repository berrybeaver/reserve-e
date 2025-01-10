document.addEventListener('DOMContentLoaded', function () {
    const dailyBonusButton = document.getElementById('dailyBonus');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    dailyBonusButton.addEventListener('click', function () {
        fetch('/points2/claim-bonus', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({}) // Sending empty object as JSON
        })
            .then(response => response.json()) // Parse JSON response from server
            .then(data => {
                alert(data.message); // Show success message from server
                location.reload(); // Reload the page to update points
            })
            .catch(error => console.error('Error:', error));
    });
});
