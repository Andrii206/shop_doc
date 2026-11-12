<template>
    <div>
        <main class="overflow-hidden ">
            <!--Start Breadcrumb Style2-->
            <section class="breadcrumb-area"
                style="background-image: url(@/assets/images/inner-pages/breadcum-bg.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-content text-center wow fadeInUp animated">
                                <h2>Cart</h2>
                                <div class="breadcrumb-menu">
                                    <ul>
                                        <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                        <li> <i class="flaticon-next"></i> </li>
                                        <li class="active">Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Breadcrumb Style2-->
            <!--Start cart area-->
            <section class="cart-area pt-120 pb-120">
                <div class="container">
                    <div class="row wow fadeInUp animated">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="cart-table-box">
                                <div class="table-outer">
                                    <table class="cart-table">
                                        <thead class="cart-header">
                                            <tr>
                                                <th class="">Product Name</th>
                                                <th class="price">Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                                <th class="hide-me"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="product in cart">
                                                <td>
                                                    <div class="thumb-box">
                                                        <router-link :to="`/products/${product.product.id}`"
                                                            class="thumb">
                                                            <img :src="product.product.image_url" alt="">
                                                        </router-link>
                                                        <router-link :to="`/products/${product.product.id}`"
                                                            class="title">
                                                            <h5>{{ product.product.title }}</h5>
                                                        </router-link>
                                                    </div>
                                                </td>
                                                <td>грн {{ product.product.price }}</td>
                                                <td class="qty">
                                                    <div class="qtySelector text-center">
                                                        <span class="decreaseQty" @click="decreaseQty(product)">
                                                            <i class="flaticon-minus"></i>
                                                        </span>
                                                        <input type="number" class="qtyValue" v-model="product.qty" />
                                                        <span class="increaseQty" @click="increaseQty(product)">
                                                            <i class="flaticon-plus"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="sub-total">{{ product.product.price * product.qty }}</td>
                                                <td>
                                                    <div @click.prevent="removeCart(product.product.id)" div
                                                        class="remove"> <i class="flaticon-cross"></i> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cart-button-box">
                                <div class="apply-coupon wow fadeInUp animated">
                                    <div class="apply-coupon-input-box mt-30 "> <input type="text" name="coupon-code"
                                            value="" placeholder="Coupon Code"> </div>
                                    <div class="apply-coupon-button mt-30"> <button class="btn--primary style2"
                                            type="submit">Apply Coupon</button> </div>
                                </div>
                                <div class="cart-button-box-right wow fadeInUp animated">
                                    <router-link to="/products"><button class="btn--primary mt-30">Continue
                                            Shopping</button></router-link>
                                    <button class="btn--primary mt-30">Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-25 my-4 py-2">
                        <input type="text" v-model="name" placeholder="name" class="my-2">
                        <input type="text" v-model="email" placeholder="email" class="my-2">
                        <input type="text" v-model="address" placeholder="address" class="my-2">
                        <input @click.prevent="storeOrder" type="submit" class="btn--primary" placeholder="name">
                    </div>
                    <div class="row pt-120">
                        <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                            <div class="cart-total-box">
                                <div class="inner-title">
                                    <h3>Cart Totals</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt--30">
                        <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                            <div class="cart-total-box mt-30">
                                <div class="table-outer">
                                    <table class="cart-table2">
                                        <thead class="cart-header clearfix">
                                            <tr>
                                                <th colspan="1" class="shipping-title">Shipping</th>
                                                <th class="price">$2500.00</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="shipping"> Shipping </td>
                                                <td class="selact-box1">
                                                    <ul class="shop-select-option-box-1">
                                                        <li> <input type="checkbox" name="free_shipping" id="option_1"
                                                                checked=""> <label for="option_1"><span></span>Free
                                                                Shipping</label> </li>
                                                        <li> <input type="checkbox" name="flat_rate" id="option_2">
                                                            <label for="option_2"><span></span>Flat Rate</label>
                                                        </li>
                                                        <li> <input type="checkbox" name="local_pickup" id="option_3">
                                                            <label for="option_3"><span></span>Local Pickup</label>
                                                        </li>
                                                    </ul>
                                                    <div class="inner-text">
                                                        <p>Shipping options will be updated during checkout</p>
                                                    </div>
                                                    <h4>Calculate Shipping</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="total">Total</h4>
                                                </td>
                                                <td class="subtotal">$2500.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                            <div class="cart-check-out mt-30">
                                <h3>Check Out</h3>
                                <ul class="cart-check-out-list">
                                    <li>
                                        <div class="left">
                                            <p>Subtotal</p>
                                        </div>
                                        <div class="right">
                                            <p>грн {{ totalPrice() }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <p>Shipping</p>
                                        </div>
                                        <div class="right">
                                            <p><span>Flat rate:</span> $50.00</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <p>Total Price:</p>
                                        </div>
                                        <div class="right">
                                            <p>$2550.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End cart area-->
        </main>
    </div>
</template>
<script>

export default {
    name: 'App',
    data() {
        return {
            products: [],
            cart: [],
            name: '',
            email: '',
            address: '',
        };
    },
    mounted() {
        $(document).trigger('changed')
        this.getProductToCart()
        $(document).on('getCart', () => {
            this.getProductToCart();
        });
    },

    computed: {

    },

    methods: {
        storeOrder() {
            const products = this.cart.map(item => {
                return {
                    ...item.product,
                    qty: item.qty
                };
            })

            this.axios.post('http://localhost:8876/api/orders', {
                'products': products,
                'name': this.name,
                'address': this.address,
                'email': this.email,
                'total_price': this.totalPrice(),
            })
                .then(res => {
                    console.log(res);
                    // this.products = res.data.data
                    // this.pagination = res.data.meta
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        },

        totalPrice() {
            let total = 0;

            this.cart.forEach(product => {
                total += product.product.price * product.qty;
            });

            return total;
        },

        getProductToCart() {

            let cart = JSON.parse(localStorage.getItem('cart'));


            if (cart && cart.length > 0) {

                this.cart = cart;
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
        removeCart(productId) {
            this.cart = this.cart.filter(product => product.product.id !== productId);
            localStorage.setItem('cart', JSON.stringify(this.cart));
            $(document).trigger('getCart')
        },
        decreaseQty(product) {
            if (product.qty > 1) {
                product.qty--;
                this.updateCart(product);
            }
        },
        increaseQty(product) {
            product.qty++;
            this.updateCart(product);
        },
        updateCart(updatedProduct) {
            this.cart = this.cart.map(product => {
                if (product.product.id === updatedProduct.id) {
                    return updatedProduct;
                }
                localStorage.setItem('cart', JSON.stringify(this.cart));
                $(document).trigger('getCart')
                return product;

            });



        }

    },



}

</script>
<style></style>