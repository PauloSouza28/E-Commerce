document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartTableBody = document.querySelector('#cartTable tbody');
    const checkoutButton = document.getElementById('checkoutButton');

    function updateCart() {
        const removeFromCartButtons = document.querySelectorAll('.remove-from-cart');
        removeFromCartButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = button.closest('tr');
                row.remove();
            });
        });
    }

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const card = button.closest('.card');
            const productName = card.querySelector('.card-title').textContent;
            const productPrice = parseFloat(card.querySelector('.product-price').textContent).toFixed(2);
            const productQuantity = 1;

            const existingRow = Array.from(cartTableBody.querySelectorAll('tr')).find(row => row.querySelector('td').textContent === productName);

            if (existingRow) {
                const quantityCell = existingRow.querySelector('.product-quantity');
                const totalCell = existingRow.querySelector('.product-total');
                const newQuantity = parseInt(quantityCell.textContent) + productQuantity;
                quantityCell.textContent = newQuantity;
                totalCell.textContent = (newQuantity * productPrice).toFixed(2);
            } else {
                const newRow = document.createElement('tr');

                const nameCell = document.createElement('td');
                nameCell.textContent = productName;

                const priceCell = document.createElement('td');
                priceCell.textContent = productPrice;

                const quantityCell = document.createElement('td');
                quantityCell.classList.add('product-quantity');
                quantityCell.textContent = productQuantity;

                const totalCell = document.createElement('td');
                totalCell.classList.add('product-total');
                totalCell.textContent = (productQuantity * productPrice).toFixed(2);

                const actionCell = document.createElement('td');
                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger', 'remove-from-cart');
                removeButton.textContent = 'Remover';
                actionCell.appendChild(removeButton);
                newRow.appendChild(actionCell);

                newRow.appendChild(nameCell);
                newRow.appendChild(priceCell);
                newRow.appendChild(quantityCell);
                newRow.appendChild(totalCell);
                newRow.appendChild(actionCell);

                cartTableBody.appendChild(newRow);
            }

            updateCart();
        });
    });

    checkoutButton.addEventListener('click', function () {
        alert('Pagamento Realizado com sucesso!!');
    });

    updateCart();
});