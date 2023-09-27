document.addEventListener("DOMContentLoaded", function () {
    const decrementButton = document.querySelector(".decrement");
    const incrementButton = document.querySelector(".increment");
    const countElement = document.querySelector(".count");

    decrementButton.addEventListener("click", function () {
        let count = parseInt(countElement.textContent);
        if (count > 1) {
            count--;
            countElement.textContent = count;
        }
    });

    incrementButton.addEventListener("click", function () {
        let count = parseInt(countElement.textContent);
        count++;
        countElement.textContent = count;
    });
});
