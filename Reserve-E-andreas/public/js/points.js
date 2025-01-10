(function () {
document.addEventListener("DOMContentLoaded", () => {
    const dailyBonusButton = document.getElementById("dailyBonus");
    const modal = document.getElementById("bonusModal");
    const closeModal = document.querySelector(".close");

    dailyBonusButton.addEventListener("click", () => {
        // Show modal
        modal.style.display = "block";
    });

    closeModal.addEventListener("click", () => {
        // Hide modal
        modal.style.display = "none";
    });
});

document.addEventListener('DOMContentLoaded', function () {
    fetch(pointsDataUrl, {
        method: "GET",
        credentials: "same-origin", // Include session cookies
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.points !== undefined) {
                document.getElementById('userPoints').textContent = `${data.points} P`;
            } else {
                document.getElementById('userPoints').textContent = "Error fetching points.";
                console.error("Error fetching points:", data.error);
            }
        })
        .catch(error => {
            document.getElementById('userPoints').textContent = "Failed to load points.";
            console.error("Error fetching points:", error);
        });

});
})();


