document.getElementById('addProduct').addEventListener('click', function() {
    const productInputs = document.querySelector('.product-inputs');
    const newProduct = document.createElement('div');
    newProduct.classList.add('product');
    newProduct.innerHTML = `
        <label for="buying_price[]">Buying Price:</label>
        <input type="number" name="buying_price[]" step="0.01" required>
    `;
    productInputs.appendChild(newProduct);
});
