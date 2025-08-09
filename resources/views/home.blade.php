<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home - EcomInnerix</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }
    
    /* Navbar styling */
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    /* Card styling */
    .card {
      border-radius: 10px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      border: none;
      overflow: hidden;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }
    
    /* Image placeholders */
    .img-placeholder {
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #999;
      font-size: 1.5rem;
      height: 200px;
    }
    .img-placeholder i {
      opacity: 0.6;
    }
    
    /* Category cards */
    .category-card {
      height: 180px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
    }
    .category-card:hover {
      background: linear-gradient(135deg, #e4e8eb 0%, #d5d9dc 100%);
    }
    
    /* Product cards */
    .product-card-img {
      height: 200px;
      object-fit: contain;
      background-color: #f9f9f9;
      padding: 20px;
    }
    
    /* Carousel styling */
    .carousel {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .carousel-item img {
      height: 300px;
      object-fit: cover;
    }
    .carousel-control-prev, .carousel-control-next {
      background-color: rgba(0,0,0,0.2);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      margin: 0 15px;
    }
    
    /* Tab styling */
    .nav-tabs {
      border-bottom: 2px solid #dee2e6;
    }
    .nav-tabs .nav-link {
      color: #495057;
      font-weight: 500;
      border: none;
      padding: 12px 20px;
      margin-right: 5px;
    }
    .nav-tabs .nav-link:hover {
      border: none;
      color: #0d6efd;
    }
    .nav-tabs .nav-link.active {
      background-color: #0d6efd;
      color: white;
      border-radius: 8px 8px 0 0;
      border: none;
      position: relative;
    }
    .nav-tabs .nav-link.active:after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #0d6efd;
    }
    
    /* Badge styling */
    .badge {
      font-weight: 500;
      padding: 5px 8px;
      font-size: 0.75rem;
    }
    
    /* Price styling */
    .price {
      font-size: 1.1rem;
      font-weight: 700;
    }
    
    /* Empty state styling */
    .empty-state {
      padding: 40px;
      text-align: center;
      background-color: #f8f9fa;
      border-radius: 10px;
    }
    .empty-state i {
      font-size: 3rem;
      color: #6c757d;
      margin-bottom: 15px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .carousel-item img {
        height: 200px;
      }
      .nav-tabs .nav-link {
        padding: 8px 12px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <i class="fas fa-store me-2"></i>EcomInnerix
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- Left aligned nav links -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search me-1"></i> Search</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-user me-1"></i> Account</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-cart me-1"></i> Cart</a></li>
      </ul>

      <!-- Right aligned icons -->
      <ul class="navbar-nav ms-auto d-flex align-items-center">
        <li class="nav-item me-3">
          <a class="nav-link" href="#" title="Favorites">
            <i class="fas fa-heart"></i>
          </a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link position-relative" href="#" title="Notifications">
            <i class="fas fa-bell"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
              <span class="visually-hidden">unread notifications</span>
            </span>
          </a>
        </li>
        <li class="nav-item">
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
    @csrf
  </form>
  <a class="nav-link" href="#" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</li>
      </ul>

    </div>
  </div>
</nav>


<div class="container mb-5">

  <!-- SIMPLIFIED BANNER CAROUSEL -->
  <div id="bannerCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets/banner_image.png') }}" 
             alt="Main Banner" 
             class="d-block" 
             style="height: 600px;  width:100%; object-fit:cover;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>

  <!-- TABS -->
  <ul class="nav nav-tabs mb-4" id="homeTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categoriesTab" type="button">
        <i class="fas fa-list-alt me-2"></i>Categories
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="top-selling-tab" data-bs-toggle="tab" data-bs-target="#topSellingTab" type="button">
        <i class="fas fa-fire me-2"></i>Top Selling
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="best-offers-tab" data-bs-toggle="tab" data-bs-target="#bestOffersTab" type="button">
        <i class="fas fa-percentage me-2"></i>Best Offers
      </button>
    </li>
  </ul>

  <!-- TAB CONTENT -->
  <div class="tab-content">

    <!-- Categories Tab -->
    <div class="tab-pane fade show active" id="categoriesTab" role="tabpanel" aria-labelledby="categories-tab">
      <h4 class="mb-4 fw-bold"><i class="fas fa-list-alt me-2"></i>Product Categories</h4>
      <div class="row g-4">
        @forelse ($homeData['categories']['items'] ?? [] as $category)
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card category-card shadow-sm h-100">
              <div class="card-body text-center p-3">
                <img src="{{ asset('assets/Ellipse1.png') }}"
                     alt="{{ $category['category_name'] ?? 'Category' }}"
                     class="img-fluid mb-3"
                     style="max-height: 80px; object-fit: contain;">
                <h6 class="fw-bold mb-0">{{ $category['category_name'] ?? 'Unnamed Category' }}</h6>
                <small class="text-muted">{{ $category['items_count'] ?? 0 }} items</small>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="empty-state text-center">
              <i class="fas fa-box-open fa-2x mb-3"></i>
              <h5 class="mb-3">No Categories Found</h5>
              <p class="text-muted">We couldn't find any product categories at the moment.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <!-- Top Selling Tab -->
    <div class="tab-pane fade" id="topSellingTab" role="tabpanel" aria-labelledby="top-selling-tab">
      <h4 class="mb-4 fw-bold"><i class="fas fa-fire me-2"></i>Top Selling Products</h4>
      <div class="row g-4">
        @forelse ($homeData['top_selling_items']['items'] ?? [] as $product)
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card h-100">
              <img src="{{ asset('assets/image5.png') }}"
                   class="card-img-top product-card-img" 
                   alt="{{ $product['name'] ?? 'Product' }}">
              <div class="card-body">
                <h6 class="card-title fw-bold">{{ $product['name'] ?? 'Unnamed Product' }}</h6>
                <p class="card-text text-muted small mb-2">{{ $product['short_description'] ?? 'No description available' }}</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="price text-success">₹{{ $product['price'] ?? 'N/A' }}</span>
                  @if(isset($product['offer_info']) && $product['offer_info'])
                    <span class="badge bg-danger">OFFER</span>
                  @endif
                </div>
                <div class="d-flex flex-wrap gap-2">
                  @if(isset($product['cash_on_delivery_available']) && $product['cash_on_delivery_available'])
                    <span class="badge bg-success"><i class="fas fa-money-bill-wave me-1"></i>COD</span>
                  @endif
                  <span class="badge {{ (isset($product['in_stock']) && $product['in_stock']) ? 'bg-primary' : 'bg-secondary' }}">
                    <i class="fas {{ (isset($product['in_stock']) && $product['in_stock']) ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                    {{ (isset($product['in_stock']) && $product['in_stock']) ? 'In Stock' : 'Out of Stock' }}
                  </span>
                </div>
              </div>
              <div class="card-footer bg-white border-top-0">
                <button class="btn btn-primary w-100 btn-add-to-cart" 
                        data-product-id="{{ $product['product_id'] ?? $product['id'] ?? '' }}"
                        data-source="top-selling">
                  <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="empty-state">
              <i class="fas fa-fire"></i>
              <h5 class="mb-3">No Top Selling Products</h5>
              <p class="text-muted">We couldn't find any top selling products at the moment.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <!-- Best Offers Tab -->
    <div class="tab-pane fade" id="bestOffersTab" role="tabpanel" aria-labelledby="best-offers-tab">
      <h4 class="mb-4 fw-bold"><i class="fas fa-percentage me-2"></i>Best Offer Items</h4>
      <div class="row g-4">
        @forelse ($homeData['best_offers']['items'] ?? [] as $product)
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card h-100">
              <img src="{{ asset('assets/Ellipse1.png') }}"
                   class="card-img-top product-card-img" 
                   alt="{{ $product['name'] ?? 'Product' }}">
              <div class="card-body">
                <h6 class="card-title fw-bold">{{ $product['name'] ?? 'Unnamed Product' }}</h6>
                <p class="card-text text-muted small mb-2">{{ $product['short_description'] ?? 'No description available' }}</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="price text-success">₹{{ $product['price'] ?? 'N/A' }}</span>
                  @if(isset($product['offer_info']) && $product['offer_info'])
                    <span class="badge bg-danger">SAVE {{ $product['offer_info']['discount'] ?? '' }}%</span>
                  @endif
                </div>
                @if(isset($product['offer_info']) && $product['offer_info'])
                  <div class="mb-2">
                    <small class="text-decoration-line-through text-muted">₹{{ $product['offer_info']['original_price'] ?? '' }}</small>
                    <small class="text-danger ms-2">{{ $product['offer_info']['discount'] ?? '' }}% OFF</small>
                  </div>
                @endif
                <div class="d-flex flex-wrap gap-2">
                  @if(isset($product['cash_on_delivery_available']) && $product['cash_on_delivery_available'])
                    <span class="badge bg-success"><i class="fas fa-money-bill-wave me-1"></i>COD</span>
                  @endif
                  <span class="badge {{ (isset($product['in_stock']) && $product['in_stock']) ? 'bg-primary' : 'bg-secondary' }}">
                    <i class="fas {{ (isset($product['in_stock']) && $product['in_stock']) ? 'fa-check-circle' : 'fa-times-circle' }} me-1"></i>
                    {{ (isset($product['in_stock']) && $product['in_stock']) ? 'In Stock' : 'Out of Stock' }}
                  </span>
                </div>
              </div>
              <div class="card-footer bg-white border-top-0">
                <button class="btn btn-danger w-100 btn-add-to-cart" 
                        data-product-id="{{ $product['product_id'] ?? $product['id'] ?? '' }}"
                        data-source="best-offers">
                  <i class="fas fa-bolt me-2"></i>Buy Now
                </button>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="empty-state">
              <i class="fas fa-percentage"></i>
              <h5 class="mb-3">No Offers Available</h5>
              <p class="text-muted">We couldn't find any special offers at the moment.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

  </div>
</div>

<!-- Product Details Modal -->
<div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productDetailsLabel">Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Product info will be injected here -->
        <div id="product-details-content">
          <p class="text-center">Loading...</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Action button will be injected here based on product source -->
        <div id="product-action-button"></div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <h5 class="fw-bold mb-3">EcomInnerix</h5>
        <p>Your one-stop shop for all your needs. Quality products at affordable prices.</p>
      </div>
      <div class="col-md-2 mb-4 mb-md-0">
        <h6 class="fw-bold">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Home</a></li>
          <li><a href="#" class="text-white text-decoration-none">Products</a></li>
          <li><a href="#" class="text-white text-decoration-none">Offers</a></li>
          <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-4 mb-md-0">
        <h6 class="fw-bold">Contact</h6>
        <address>
          123 Market Street<br />
          New Delhi, India<br />
          Phone: +91 12345 67890<br />
          Email: support@ecominnerix.com
        </address>
      </div>
      <div class="col-md-3">
        <h6 class="fw-bold">Follow Us</h6>
        <div class="d-flex gap-3">
          <a href="#" class="text-white fs-4"><i class="fab fa-facebook"></i></a>
          <a href="#" class="text-white fs-4"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white fs-4"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-white fs-4"><i class="fab fa-linkedin"></i></a>
        </div>
      </div>
    </div>
    <hr class="bg-secondary mt-4" />
    <p class="mb-0 text-center">&copy; {{ date('Y') }} EcomInnerix. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.btn-add-to-cart').forEach(button => {
    button.addEventListener('click', async function() {
      const productId = this.dataset.productId;
      const sourceTab = this.dataset.source; // 'top-selling' or 'best-offers'
      if (!productId) return;

      // Show modal
      const modalEl = document.getElementById('productDetailsModal');
      const modal = new bootstrap.Modal(modalEl);
      modal.show();

      const contentEl = document.getElementById('product-details-content');
      const actionButtonEl = document.getElementById('product-action-button');
      contentEl.innerHTML = '<p class="text-center">Loading...</p>';
      actionButtonEl.innerHTML = '';

     try {
  const response = await fetch(`https://app.ecominnerix.com/api/products/${productId}`);
  const data = await response.json();

  if (data.status && data.product) {
    const p = data.product;
    contentEl.innerHTML = `
      <div class="row">
        <div class="col-md-6 mb-3">
          ${
            p.thumbnail_image
              ? `<img src="${p.thumbnail_image}" alt="${p.name ?? 'Product'}" class="img-fluid rounded" />`
              : `<img src="/assets/image5.png" alt="Default Image" class="img-fluid rounded" />`
          }
        </div>
        <div class="col-md-6">
          <h3>${p.name}</h3>
          <p><strong>SKU:</strong> ${p.sku ?? 'N/A'}</p>
          <p><strong>Description:</strong><br> ${p.description ?? 'No description available.'}</p>
          <p><strong>Price:</strong> ₹${p.price ?? 'N/A'}</p>
          ${
            p.offer_info
              ? `
                <p><strong>Offer:</strong> 
                  <span class="text-decoration-line-through">₹${p.offer_info.original_price}</span>
                  <span class="text-danger"> (${p.offer_info.discount}% OFF)</span>
                </p>
              `
              : ''
          }
          <p><strong>Stock:</strong> ${
            p.in_stock ? `In Stock (${p.stock_quantity})` : 'Out of Stock'
          }</p>
          <p><strong>Cash on Delivery:</strong> ${
            p.cash_on_delivery_available ? 'Available' : 'Not Available'
          }</p>
        </div>
      </div>
    `;

    // Add the appropriate action button based on source tab
    if (sourceTab === 'top-selling') {
      actionButtonEl.innerHTML = `
        <button class="btn btn-primary btn-add-to-cart-modal" data-product-id="${p.product_id}">
          <i class="fas fa-cart-plus me-2"></i>Add to Cart
        </button>
      `;
    } else if (sourceTab === 'best-offers') {
      actionButtonEl.innerHTML = `
        <button class="btn btn-danger btn-buy-now-modal" data-product-id="${p.product_id}">
          <i class="fas fa-bolt me-2"></i>Buy Now
        </button>
      `;
    } else {
      actionButtonEl.innerHTML = '';
    }
  } else {
    contentEl.innerHTML = '<p class="text-danger text-center">Failed to load product details.</p>';
  }
} catch (error) {
  console.error('Error fetching product details:', error);
  contentEl.innerHTML = '<p class="text-danger text-center">Error loading product details. Please try again.</p>';
}
    });
  });
async function handleLogout(event) {
  event.preventDefault();
  
  try {
    const response = await fetch('/logout', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      credentials: 'same-origin' // Include cookies for session-based auth
    });

    if (response.ok) {
      // Clear any client-side storage if needed
      localStorage.removeItem('authToken');
      sessionStorage.removeItem('userData');
      
      // Redirect to login page or home
      window.location.href = '/login';
    } else {
      console.error('Logout failed:', response.statusText);
      alert('Logout failed. Please try again.');
    }
  } catch (error) {
    console.error('Error during logout:', error);
    alert('An error occurred during logout.');
  }
}
  // Event delegation for modal buttons since they're dynamically added
  document.addEventListener('click', function(e) {
    if (e.target.closest('.btn-add-to-cart-modal')) {
      const button = e.target.closest('.btn-add-to-cart-modal');
      const productId = button.dataset.productId;
      alert(`Product ${productId} added to cart!`);
      // Here you would typically make an API call to add to cart
    }
    
    if (e.target.closest('.btn-buy-now-modal')) {
      const button = e.target.closest('.btn-buy-now-modal');
      const productId = button.dataset.productId;
      alert(`Proceeding to checkout with product ${productId}!`);
      // Here you would typically redirect to checkout or make an API call
    }
  });
});
</script>

</body>
</html>