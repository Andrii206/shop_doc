<template>
    <div>
        <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(@/assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Compare</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Compare</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start Compare-->
        <section class="compare pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp animated">
                        <div class="compare-table-box">
                            <div class="compare-table-outer">
                                <table class="compare-table">
                                    <thead class="compare-header">
                                        <tr>
                                            <th>
                                                <p> Product </p>
                                            </th>
                                            <th v-for="product in compare">
                                                <div class="compare-product-img-1"> <img
                                                    :src="product.product.image_url" alt="">
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5>Name</h5>
                                            </td>
                                            <td v-for="product in compare">
                                                <h5>{{product.product.title}}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Description</h5>
                                            </td>
                                            <td v-for="product in compare">
                                                <p>{{product.product.description}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Price</h5>
                                            </td>
                                            <td v-for="product in compare" class="price">{{product.product.price}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Color</h5>
                                            </td>
                                            <td v-for="product in compare">
                                                <div style="display: flex;" >
                                                    <div v-for="color in product.product.colors" class="mx-auto" :style="{ width: '20px', height: '20px', background: '#' + color.title, display:flex }"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Stock</h5>
                                            </td>
                                            <td v-for="product in compare" class="color" >{{ product.product.count > 0 ? 'In Stock' : 'Out of Stock' }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Add to cart</h5>
                                            </td>
                                            <td v-for="product in compare"> <a  @click.prevent="addToCart(product.product.id, true)" class="btn--primary style2">Add To Cart</a> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Delete</h5>
                                            </td>
                                            <td v-for="product in compare">
                                                <div class="delete-box"> <a @click.prevent="removeCopmare(product.product.id)"><i class="flaticon-delete"></i></a>
                                                </div>
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
        <!--End Order Compare-->
        </main>
    </div>
</template>
<script>

export default {
  name: 'App',
  data() {
    return {
        products: [],
        compare: [],
    };
  },
  mounted() {
    $(document).trigger('changed')
    this.getProductToCompare()
    $(document).on('getCompare', () => {
      this.getProductToCompare();
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
    getProductToCompare() {
      let compare = JSON.parse(localStorage.getItem('compare'));
      if (compare && compare.length > 0) {
        this.compare = compare;
        console.log(this.compare)
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
    removeCopmare(productId) {
        this.compare = this.compare.filter(product => product.product.id !== productId);
        localStorage.setItem('compare', JSON.stringify(this.compare));

        // Оновлення даних у вашому компоненті після видалення товару
        $(document).trigger('getCompare');
    }


  },



}

</script>
<style>
</style>