import Plugin from 'src/plugin-system/plugin.class';
import HttpClient from 'src/service/http-client.service';

export default class MinimalCartPlugin extends Plugin {
    init() {
        this._registerAddToCart();
        this._registerCartIconClick();
    }

    _registerAddToCart() {
        document.addEventListener('click', (event) => {
            if (event.target.matches('.add-to-cart-button')) {
                event.preventDefault();

                const itemId = event.target.dataset.productId;
                this._addToCart(itemId);
            }
        });
    }

    _addToCart(itemId) {
        const url = '/checkout/cart/add'; // Update with your route
        const data = { lineItems: [{ id: itemId, quantity: 1 }] };

        const client = new HttpClient();
        client.post(url, JSON.stringify(data)).then((response) => {
            // Call the function to display the minimal off-canvas with the last added item
            this._showMinimalOffCanvas(response.data);
        });
    }

    _showMinimalOffCanvas(cartData) {
        // Here, you would implement the logic to display the minimal off-canvas
        // You may want to populate the off-canvas with `cartData`, which contains the last added item details

        // Example of how you might show the off-canvas:
        const offCanvas = document.getElementById('minimal-offcanvas');
        offCanvas.innerHTML = this._generateMinimalOffCanvasContent(cartData);
        offCanvas.classList.add('is-open'); // Assuming you're using a class to show the off-canvas
    }

    _generateMinimalOffCanvasContent(cartData) {
        // Generate and return the HTML content for the minimal off-canvas
        // This is a simple example; customize it based on your cart data structure
        const lastItem = cartData.lineItems[cartData.lineItems.length - 1]; // Get the last item
        return `
            <div class="minimal-offcanvas-content">
                <h2>Added to Cart</h2>
                <p>${lastItem.label} - ${lastItem.quantity}</p>
            </div>
            <button id="view-cart-button">View Cart</button>
        `;
    }

    _registerCartIconClick() {
        document.addEventListener('click', (event) => {
            if (event.target.matches('#cart-icon')) {
                event.preventDefault();
                this._showFullCart(); // Call the function to show the full cart off-canvas
            }
        });
    }

    _showFullCart() {
        // Logic to show the full cart off-canvas (you may already have this implemented)
        const fullCart = document.getElementById('full-cart-offcanvas');
        fullCart.classList.add('is-open');
    }
}
