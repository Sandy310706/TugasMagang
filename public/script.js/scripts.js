document.querySelector('.arrow.left').addEventListener('click', () => {
    document.querySelector('.cards-container').scrollBy({ left: -400, behavior: 'smooth' });
   });
   
   document.querySelector('.arrow.right').addEventListener('click', () => {
    document.querySelector('.cards-container').scrollBy({ left: 400, behavior: 'smooth' });
   });