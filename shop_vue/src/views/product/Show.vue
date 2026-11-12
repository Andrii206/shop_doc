<template>
    <div>
        <main v-if="product && product.id">
            <!--Start Shop Details Breadcrumb-->
            <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="shop-details-inner">
                                <ul class="shop-details-menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Shop Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Shop Details Breadcrumb-->
            <!--Start Shop Details Top-->
            <section class="shop-details-top two ">
                <div class="container">
                    <div class="row mt--30">
                        <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                            <div class="single-product-box one">
                                <div class="big-product single-product-one slider-for">
                                    <div>
                                        <div v-for="image in product.product_images" class="single-item"> <img
                                                :src="image.url" alt="">
                                            <div class="ptag"></div> <a href="#0" class="love"> <i
                                                    class="flaticon-like"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="navholder">
                                    <div class="product-slicknav single-product-one-nav slider-nav">
                                        <div v-for="image in product.product_images"> <span class="single-item"> <img
                                                    :src="image.url" alt=""> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                            <div class="shop-details-top-right ">
                                <div class="shop-details-top-right-content-box">
                                    <div class="shop-details-top-review-box">
                                    </div>
                                    <div class="shop-details-top-title">
                                        <h3>{{ product.title }}</h3>
                                    </div>

                                    <div class="shop-details-top-price-box">
                                        <h3>{{ product.price }}</h3>
                                    </div>


                                    <div class="shop-details-top-color-sky-box">
                                        <h4>Color: </h4>
                                        <ul class="varients">
                                            <li v-for="color in product.colors">
                                                <div
                                                    :style="{ width: '70px', height: '70px', background: '#' + color.title }">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-quantity">
                                        <h4>Quantity</h4>
                                        <div class="product-quantity-box d-flex align-items-center flex-wrap">
                                            <div class="qty mr-2">
                                                <div class="qtySelector text-center"> <span class="decreaseQty"><i
                                                            class="flaticon-minus"></i> </span> <input type="number"
                                                        class="qtyValue" value="1" /> <span class="increaseQty"> <i
                                                            class="flaticon-plus"></i> </span> </div>
                                            </div>
                                            <div class="product-quantity-check"> <i class="flaticon-select"></i>
                                                <p>In Stock</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-details-top-cart-box-btn"> <button
                                            @click.prevent="addToCart(product.id, false)" class="btn--primary style2 "
                                            type="submit">Add to Cart</button> </div>
                                    <div class="shop-details-top-social-box">
                                        <p>Share:</p>
                                        <ul class="ps-1 social_link d-flex align-items-center">
                                            <li><a href="https://www.facebook.com/" class="active" target="_blank"><i
                                                        class="flaticon-facebook-app-symbol"></i></a> </li>
                                            <li> <a href="https://www.youtube.com/" target="_blank"><i
                                                        class="flaticon-youtube"></i></a> </li>
                                            <li> <a href="https://twitter.com/" target="_blank"><i
                                                        class="flaticon-twitter"></i></a> </li>
                                            <li> <a href="https://www.instagram.com/" target="_blank"><i
                                                        class="flaticon-instagram"></i></a> </li>
                                        </ul>
                                    </div>
                                    <ul class="shop-details-top-category-tags">
                                        <li>Category: <span>{{ product.category.title }}</span></li>
                                        <li>Tags: <span v-for="tag in product.tags">{{ tag.title
                                                }}<span>&nbsp;</span></span></li>
                                    </ul>
                                    <ul class="shop-details-top-feature">
                                        <li>
                                            <div class="icon"> <i class="flaticon-portfolio"></i> </div>
                                            <div class="text">
                                                <p>Money back guarantee</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"> <i class="flaticon-truck"></i> </div>
                                            <div class="text">
                                                <p>Free Shipping & Return</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon"> <i class="flaticon-security"></i> </div>
                                            <div class="text">
                                                <p>Comportable Support</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Shop Details Top-->
            <!-- productdrescription-tabStart -->
            <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden ">
                <div class="container">
                    <div class="row wow fadeInUp animated">
                        <div class="col-12">
                            <ul class="nav product-details-nav nav-one nav-pills justify-content-center"
                                id="pills-tab-two" role="tablist">
                                <li class="nav-item" role="presentation"> <button class="nav-link active"
                                        id="pills-description-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-description" type="button" role="tab"
                                        aria-controls="pills-description" aria-selected="true">
                                        Description </button> </li>
                                <li class="nav-item" role="presentation"> <button class="nav-link"
                                        id="pills-additional-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-additional" type="button" role="tab"
                                        aria-controls="pills-additional" aria-selected="false"> Additional </button>
                                </li>
                                <li class="nav-item" role="presentation"> <button class="nav-link"
                                        id="pills-sizechart-tab" data-bs-toggle="pill" data-bs-target="#pills-sizechart"
                                        type="button" role="tab" aria-controls="pills-sizechart" aria-selected="false">
                                        Size Chart </button> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row wow fadeInUp animated">
                        <div class="tab-content" id="pills-tabContent-two">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="product-drescription">
                                    <h4> Product Details:</h4>
                                    <p> {{ product.description }} </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-additional" role="tabpanel"
                                aria-labelledby="pills-additional-tab">
                                <div class="product-drescription">
                                    <h4>Content</h4>
                                    <p class="pt-0">{{ product.content }}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-sizechart" role="tabpanel"
                                aria-labelledby="pills-sizechart-tab">
                                <div class="product-drescription">
                                    <div class="size-chirt">
                                        <h4>Size Guide</h4>
                                        <p class="pt-0"> Assertively conceptualize parallel process improvements through
                                            user friendly colighue to action items. </p>
                                        <div class="size-tabble">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Size</th>
                                                        <th>XXS - XS</th>
                                                        <th>XS - S</th>
                                                        <th>S - M</th>
                                                        <th>M - L</th>
                                                        <th>L - XL</th>
                                                        <th>XL - XXL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>ARGENTINA</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                        <td>10</td>
                                                        <td>11</td>
                                                        <td>12</td>
                                                    </tr>
                                                    <tr>
                                                        <td>BOLIVIA</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                        <td>10</td>
                                                        <td>11</td>
                                                        <td>12</td>
                                                        <td>13</td>
                                                    </tr>
                                                    <tr>
                                                        <td>COLOMBIA</td>
                                                        <td>26</td>
                                                        <td>28</td>
                                                        <td>30</td>
                                                        <td>32</td>
                                                        <td>34</td>
                                                        <td>36</td>
                                                    </tr>
                                                    <tr>
                                                        <td>China</td>
                                                        <td>34</td>
                                                        <td>36</td>
                                                        <td>38</td>
                                                        <td>40</td>
                                                        <td>42</td>
                                                        <td>44</td>
                                                    </tr>
                                                    <tr>
                                                        <td>MEXICO</td>
                                                        <td>32</td>
                                                        <td>34</td>
                                                        <td>36</td>
                                                        <td>38</td>
                                                        <td>40</td>
                                                        <td>42</td>
                                                    </tr>
                                                    <tr>
                                                        <td>JAMAICA</td>
                                                        <td>40</td>
                                                        <td>42</td>
                                                        <td>44</td>
                                                        <td>46</td>
                                                        <td>48</td>
                                                        <td>50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>MEXICO</td>
                                                        <td>32</td>
                                                        <td>34</td>
                                                        <td>36</td>
                                                        <td>38</td>
                                                        <td>40</td>
                                                        <td>42</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td>6</td>
                                                        <td>8</td>
                                                        <td>10</td>
                                                        <td>12</td>
                                                        <td>14</td>
                                                        <td>16</td>
                                                    </tr>
                                                    <tr>
                                                        <td>USA</td>
                                                        <td>33</td>
                                                        <td>44</td>
                                                        <td>55</td>
                                                        <td>66</td>
                                                        <td>77</td>
                                                        <td>88</td>
                                                    </tr>
                                                    <tr>
                                                        <td>UK</td>
                                                        <td>6</td>
                                                        <td>8</td>
                                                        <td>10</td>
                                                        <td>12</td>
                                                        <td>14</td>
                                                        <td>16</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Pant</strong></td>
                                                        <td>22-23 </td>
                                                        <td>24-25</td>
                                                        <td>26-27</td>
                                                        <td>28-29</td>
                                                        <td>30-31</td>
                                                        <td>32-33</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- productdrescription-tab End -->
            <!-- recent-products Start -->
            <section class="recent-products pt-60 pb-120 overflow-hidden wow fadeInUp">
                <div class="container ">
                    <div class="row">
                        <div class="col-12 wow fadeInUp animated">
                            <div class="section-head text-center">
                                <h2>Recent Products </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-30 wow fadeInUp animated">
                        <div class="catagory-slider">
                            <div v-for="product in product.group_products" class="products-grid-one">
                                <div class="products-grid-one__product-image">
                                    <div class="products-grid-one__badge-box"> <span
                                            class="bg_base badge new ">New</span>
                                    </div> <a href="shop-details-1.html" class="d-block products-grid__image_holder">
                                        <img :src="product.image_url" alt="Alt"> </a>
                                    <div class="products-grid__usefull-links">
                                        <ul>
                                            <li><a @click.prevent="addToWishlist(product.id, true)"> <i
                                                        class="flaticon-heart"> </i> <span>
                                                        wishlist</span> </a> </li>
                                            <li><a @click.prevent="addToCompare(product.id, true)"> <i
                                                        class="flaticon-left-and-right-arrows"></i>
                                                    <span> compare</span> </a> </li>
                                            <li><a @click="getProductPopup(product.id)" :href="`#popup${product.id}`"
                                                    class="popup_link"> <i class="flaticon-visibility"></i> <span> quick
                                                        view</span> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div :id="`popup${product.id}`" class="product-gird__quick-view-popup mfp-hide">
                                    <div v-if="popupProduct" class="container">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-lg-6">
                                                <div class="quick-view__left-content">
                                                    <div class="tabs">
                                                        <div class="popup-product-thumb-box">
                                                            <ul>
                                                                <li v-for="productImage in popupProduct.product_images"
                                                                    class="tab-nav popup-product-thumb">
                                                                    <a :href="`#tabb${productImage.id}`">
                                                                        <img :src="productImage.url" alt="" /> </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="popup-product-main-image-box">
                                                            <div v-for="productImage in popupProduct.product_images"
                                                                :id="`tabb${productImage.id}`"
                                                                class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image">
                                                                    <img :src="productImage.url" alt="" />
                                                                </div>
                                                            </div>
                                                            <button class="prev"> <i class="flaticon-back"></i>
                                                            </button> <button class="next"> <i
                                                                    class="flaticon-next"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="popup-right-content">
                                                    <h3>{{ popupProduct.title }}</h3>
                                                    <div class="ratting"> <i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                        <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                        <span>(112)</span>
                                                    </div>
                                                    <p class="text"> {{ popupProduct.description
                                                    }}
                                                    </p>
                                                    <div class="price">
                                                        <h2> грн{{ popupProduct.price }} </h2>
                                                        <h6> In stuck</h6>
                                                    </div>
                                                    <div class="color-varient">
                                                        <template v-for="groupProduct in popupProduct.group_products">
                                                            <template v-for="color in groupProduct.colors">
                                                                <a @click.prevent="getProduct(groupProduct.id)"
                                                                    :style="`background: #${color.title};`"
                                                                    class="color-name"></a>
                                                            </template>
                                                        </template>
                                                    </div>
                                                    <div class="add-product">
                                                        <h6>Qty:</h6>
                                                        <div class="button-group">
                                                            <div class="qtySelector text-center">
                                                                <span class="decreaseQty"><i class="flaticon-minus"></i>
                                                                </span> <input type="number" class="qtyValue"
                                                                    value="1" />
                                                                <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                                </span>
                                                            </div>
                                                            <button @click.prevent="addToCart(product.id, false)"
                                                                class="btn--primary "> Add
                                                                to
                                                                Cart </button>
                                                        </div>
                                                    </div>
                                                    <div class="payment-method"> <a href="#0">
                                                            <img src="@/assets/images/payment_method/method_1.png"
                                                                alt=""> </a>
                                                        <a href="#0"> <img
                                                                src="@/assets/images/payment_method/method_2.png"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="@/assets/images/payment_method/method_3.png"
                                                                alt=""> </a>
                                                        <a href="#0"> <img
                                                                src="@/assets/images/payment_method/method_4.png"
                                                                alt=""> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-grid__content"> <a @click.prevent="addToCart(product.id, false)"
                                        class="products-grid__cart-btn btn--primary"> <span class="one"> Add to Cart
                                        </span>
                                        <span class="two"> <i class="flaticon-shopping-cart"> </i> </span> </a>
                                    <div class="ratting"> <i class="flaticon-star"></i> <i class="flaticon-star"></i> <i
                                            class="flaticon-star"></i> <i class="flaticon-star"></i> <i
                                            class="flaticon-star"></i> </div>
                                    <h5 class="product_name"><a href="shop-details-1.html">{{ product.title }} </a></h5>
                                    <div class="price d-flex align-content-center justify-content-center">
                                        <p>{{ product.price }} грн</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- recent-products End -->
        </main>
        <div v-else class="container text-center py-5">
            <p>Завантаження товару...</p>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Index',
    mounted() {
        $(document).trigger('changed');
    },

    data() {
        return {
            product: null,
            popupProduct: null,
        };
    },
    created() {
        this.getProduct();
    },

    methods: {
        getProduct() {
            const id = this.$route.params.id;
            this.axios.get(`http://localhost:8876/api/products/${id}`)
                .then(res => {
                    this.product = res.data.data;
                    console.log(this.product);
                })
                .finally(() => {
                    $(document).trigger('changed');
                });
        },
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
        addToWishlist(id, isSingle) {
            this.axios.get(`http://localhost:8876/api/products/${id}`)
                .then(res => {
                    this.product = res.data.data;

                    let wishlist = localStorage.getItem('wishlist');

                    let newProduct = {
                        'id': id,
                        'product': this.product,
                    };

                    if (!wishlist) {
                        localStorage.setItem('wishlist', JSON.stringify([newProduct]));
                    } else {
                        wishlist = JSON.parse(wishlist);
                        const index = wishlist.findIndex(productInWishlist => productInWishlist.id === id);

                        if (index !== -1) {
                            wishlist.splice(index, 1);
                        } else {
                            wishlist.push(newProduct);
                        }

                        localStorage.setItem('wishlist', JSON.stringify(wishlist));
                    }
                    $(document).trigger('getWishlist');
                })
                .catch(error => {
                    console.error('Error fetching product:', error);
                });
        },

        addToCompare(id, isSingle) {
            this.axios.get(`http://localhost:8876/api/products/${id}`)
                .then(res => {
                    this.product = res.data.data;

                    let compare = localStorage.getItem('compare');

                    let newProduct = {
                        'id': id,
                        'product': this.product,
                    };

                    if (!compare) {
                        localStorage.setItem('compare', JSON.stringify([newProduct]));
                    } else {
                        compare = JSON.parse(compare);
                        const index = compare.findIndex(productInCompare => productInCompare.id === id);

                        if (index !== -1) {
                            compare.splice(index, 1);
                        } else {
                            compare.push(newProduct);
                        }

                        localStorage.setItem('compare', JSON.stringify(compare));
                    }
                    $(document).trigger('getCompare');
                })
                .catch(error => {
                    console.error('Error fetching product:', error);
                });
        },
        getProductPopup(id) {
            this.axios.get(`http://localhost:8876/api/products/${id}`)
                .then(res => {
                    this.popupProduct = res.data.data
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        },
    },
};
</script>

<style></style>