// Add to Cart Functionality
function addToCart(productId) {
  console.log("Add to Cart button clicked. Product ID:", productId); // Debugging line
  fetch('add_to_cart.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({ productId: productId })
  })
  .then(response => response.json())
  .then(data => {
      console.log("Response from server:", data); // Debugging line
      alert(data.message); // Show a success message
      updateCart(); // Update the cart display
  })
  .catch(error => {
      console.error('Error:', error);
  });
}
// Update Cart Display
function updateCart() {
  fetch('get_cart.php')
  .then(response => response.json())
  .then(data => {
      const shoppingCart = document.querySelector('.shopping-cart');
      shoppingCart.innerHTML = ''; // Clear the cart
      let total = 0;

      data.forEach(item => {
          shoppingCart.innerHTML += `
              <div class="box">
                  <i class="fas fa-trash" onclick="removeFromCart(${item.id})"></i>
                  <img src="images/${item.image}" alt="${item.name}">
                  <div class="content">
                      <h3>${item.name}</h3>
                      <span class="price">$${item.price}</span>
                      <span class="quantity">qty: ${item.quantity}</span>
                  </div>
              </div>
          `;
          total += item.price * item.quantity;
      });

      shoppingCart.innerHTML += `<div class="total">Total: $${total.toFixed(2)}</div>`;
      shoppingCart.innerHTML += `<a href="checkout.php" class="btn">Checkout</a>`;
  });
}

// Remove Item from Cart
function removeFromCart(cartId) {
  fetch('remove_from_cart.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify({ cartId: cartId })
  })
  .then(response => response.json())
  .then(data => {
      alert(data.message); // Show a success message
      updateCart(); // Update the cart display
  })
  .catch(error => {
      console.error('Error:', error);
  });
}