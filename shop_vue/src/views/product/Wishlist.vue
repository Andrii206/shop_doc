<template>
    <div>
        <main class="overflow-hidden">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(@/assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Wishlist</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Wishlist</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start Wishlist-->
        <section class="wishlist pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp animated">
                        <div class="wishlist-table-box">
                            <div class="wishlist-table-outer">
                                <table class="wishlist-table">
                                    <thead class="wishlist-header">
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Stock Status</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in wishlist">
                                            <td>
                                                <div class="wishlist-thumb"> <img
                                                    :src="product.product.image_url" alt=""> </div>
                                            </td>
                                            <td>
                                                <h5>{{product.product.title}}</h5>
                                            </td>
                                            <td>
                                                <p class="price">{{product.product.price}}</p>
                                            </td>
                                            <td>
                                                <p class="instock">{{ product.product.count > 0 ? 'In Stock' : 'Out of Stock' }}</p>
                                            </td>
                                            <td class="add-to-cart-btn"> <a  @click.prevent="addToCart(product.product.id, true)"
                                                    class=" btn--primary style2 ">Add To Cart</a> </td>
                                            <td>
                                                <div @click.prevent="removeWishlist(product.product.id)" class="remove"> <i class="flaticon-cross"></i> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Wishlist-->
    </main>
    </div>
</template>
<script>

export default {
  name: 'App',
  data() {
    return {
        products: [],
        wishlist: [],
    };
  },
  mounted() {
    $(document).trigger('changed')
    this.getProductToWishlist()
    $(document).on('getWishlist', () => {
      this.getProductToWishlist();
    });
  },

  computed: {
    
  },

  methods: {
    addToCart(id, isSingle) {
        this.axios.get(`http://localhost:8876/api/products/${id}`)
            .then(res => {
                this.product = res.data.data;
                let qty = isSingle ? 1 : $('.qtyValue').val();
                $('.qtyValue').val(1);

                let cart = localStorage.getItem('cart');

                let newProduct = {
                    'id': id,
                    'qty': qty,
                    'product': this.product,
                };

                if (!cart) {
                    localStorage.setItem('cart', JSON.stringify([newProduct])); 
                } else {
                    cart = JSON.parse(cart);
                    let found = false;
                    cart.forEach(productInCart => {
                        if (productInCart.id === id) {
                            productInCart.qty = Number(productInCart.qty) + Number(qty);
                            found = true;
                        }
                    });
                    if (!found) {
                        cart.push(newProduct);
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));

                    this.cart = cart;

                    $(document).trigger('getCart');
                }
            })
            .catch(error => {
                console.error('Error fetching product:', error);
            });
    },
    getProductToWishlist() {
      let wishlist = JSON.parse(localStorage.getItem('wishlist'));
      if (wishlist && wishlist.length > 0) {
        this.wishlist = wishlist;
      }
    },
    getProduct(id) {
      this.axios.get(`http://localhost:8876/api/products/${id}`)
        .then(res => {
          this.popupProduct = res.data.data
        })
        .finally(v => {
          $(document).trigger('changed')
        })
    },
    removeWishlist(productId) {
      this.wishlist = this.wishlist.filter(product => product.product.id !== productId);
      localStorage.setItem('wishlist', JSON.stringify(this.wishlist));
      $(document).trigger('getWishlist')
    },

  },



}

</script>
<style>
</style>