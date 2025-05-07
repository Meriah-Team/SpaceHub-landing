document.addEventListener('DOMContentLoaded', () => {
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const nextButton = document.querySelector('.carousel-next');
    const prevButton = document.querySelector('.carousel-prev');
    let currentIndex = 0;

    // Function to update the main image
    function updateMainImage(index) {
      mainImage.src = thumbnails[index].src;
      mainImage.alt = thumbnails[index].alt;
      currentIndex = index;
    }

    // Next button click handler
    nextButton.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % thumbnails.length; // Cycle to next image
      updateMainImage(currentIndex);
    });

    // Previous button click handler
    prevButton.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length; // Cycle to previous image
      updateMainImage(currentIndex);
    });

    // Optional: Click on thumbnail to update main image
    thumbnails.forEach((thumbnail, index) => {
      thumbnail.addEventListener('click', () => {
        updateMainImage(index);
      });
    });
  });
