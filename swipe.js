document.addEventListener("DOMContentLoaded", function () {
  const stack = document.getElementById("cardStack");

  function setupCards() {
    const cards = stack.querySelectorAll(".card");
    cards.forEach((card, index) => {
      card.style.zIndex = cards.length - index;
      card.style.transform = `scale(${1 - index * 0.03}) translateY(${index * 10}px)`;
      card.style.opacity = index === 0 ? 1 : 0.9 - index * 0.1;
    });
  }

  function enableSwipe(card) {
    let startX = 0, currentX = 0, isDragging = false;

    card.addEventListener("touchstart", (e) => {
      startX = e.touches[0].clientX;
      isDragging = true;
      card.style.transition = "none";
    });

    card.addEventListener("touchmove", (e) => {
      if (!isDragging) return;
      currentX = e.touches[0].clientX - startX;
      card.style.transform = `translateX(${currentX}px) rotate(${currentX * 0.05}deg)`;
    });

    card.addEventListener("touchend", () => {
      isDragging = false;
      card.style.transition = "transform 0.3s ease";

      if (Math.abs(currentX) > 100) {
        card.style.transform = `translateX(${currentX > 0 ? 1000 : -1000}px) rotate(${currentX * 0.1}deg)`;
        setTimeout(() => {
          stack.removeChild(card);
          setupCards();
          addSwipeToTopCard();
        }, 300);
      } else {
        card.style.transform = "";
      }

      currentX = 0;
    });
  }

  function addSwipeToTopCard() {
    const cards = stack.querySelectorAll(".card");
    if (cards.length > 0) {
      enableSwipe(cards[0]);
    }
  }

  setupCards();
  addSwipeToTopCard();
});
