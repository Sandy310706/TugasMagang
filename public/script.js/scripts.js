document.querySelector('.arrow.left').addEventListener('click', () => {
    document.querySelector('.cards-container').scrollBy({ left: -201, behavior: 'smooth' });
   });
   
   document.querySelector('.arrow.right').addEventListener('click', () => {
    document.querySelector('.cards-container').scrollBy({ left: 201, behavior: 'smooth' });
   });