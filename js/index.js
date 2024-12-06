const items = document.querySelectorAll('#items');

items.forEach(item => {
    item.addEventListener('click', () => {
        alert("clicked")
    });
});