// Elements
const homePage = document.getElementById('homePage');
const pointsPage = document.getElementById('pointsPage');
const redeemPage = document.getElementById('redeemPage');
const myPointsButton = document.getElementById('myPointsButton');
const backButton = document.getElementById('backButton');
const headerTitle = document.getElementById('header-title');
const claimBonusButton = document.getElementById('claimBonusButton');
const redeemPointsButton = document.getElementById('redeemPointsButton');
const bonusModal = document.getElementById('bonusModal');
const closeModalButton = document.getElementById('closeModalButton');
const userPointsBox = document.getElementById('userPoints');

// Simulated user points
let userPoints = 300;

// Show Points Page
myPointsButton.addEventListener('click', () => {
  homePage.classList.add('hidden');
  pointsPage.classList.remove('hidden');
  headerTitle.textContent = "Meine Punkte";
  backButton.classList.remove('hidden');
  updatePointsDisplay();
});

// Go Back to Home Page
backButton.addEventListener('click', () => {
  if (!redeemPage.classList.contains('hidden')) {
    redeemPage.classList.add('hidden');
    pointsPage.classList.remove('hidden');
    headerTitle.textContent = "Meine Punkte";
  } else {
    pointsPage.classList.add('hidden');
    homePage.classList.remove('hidden');
    headerTitle.textContent = "SmartLab EV-Charging";
    backButton.classList.add('hidden');
  }
});

// Update Points Display
function updatePointsDisplay() {
  userPointsBox.textContent = `${userPoints} P`;
}

// Claim Bonus and Show Modal
claimBonusButton.addEventListener('click', () => {
  userPoints += 50; // Add bonus points
  updatePointsDisplay();
  bonusModal.classList.remove('hidden'); // Show modal
});

// Close Modal
closeModalButton.addEventListener('click', () => {
  bonusModal.classList.add('hidden');
});

// Navigate to Redeem Points Page
redeemPointsButton.addEventListener('click', () => {
  pointsPage.classList.add('hidden');
  redeemPage.classList.remove('hidden');
  headerTitle.textContent = "PUNKTE EINLÖSEN";
});

// Close Modal by Clicking Outside
window.addEventListener('click', (event) => {
  if (event.target === bonusModal) {
    bonusModal.classList.add('hidden');
  }
});