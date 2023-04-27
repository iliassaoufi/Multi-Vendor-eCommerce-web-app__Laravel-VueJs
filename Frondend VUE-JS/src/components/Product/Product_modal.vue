<template>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="tab-content quickview-big-img">
                <div id="pro-1" class="tab-pane fade show active">
                  <img src="assets/img/product/quickview-l1.jpg" alt="" />
                </div>
                <div id="pro-2" class="tab-pane fade">
                  <img src="assets/img/product/quickview-l2.jpg" alt="" />
                </div>
                <div id="pro-3" class="tab-pane fade">
                  <img src="assets/img/product/quickview-l3.jpg" alt="" />
                </div>
                <div id="pro-4" class="tab-pane fade">
                  <img src="assets/img/product/quickview-l2.jpg" alt="" />
                </div>
              </div>
              <!-- Thumbnail Large Image End -->
              <!-- Thumbnail Image End -->
              <div class="quickview-wrap mt-15">
                <div
                  class="quickview-slide-active owl-carousel nav nav-style-1"
                  role="tablist"
                >
                  <a class="active" data-toggle="tab" href="#pro-1"
                    ><img src="assets/img/product/quickview-s1.jpg" alt=""
                  /></a>
                  <a data-toggle="tab" href="#pro-2"
                    ><img src="assets/img/product/quickview-s2.jpg" alt=""
                  /></a>
                  <a data-toggle="tab" href="#pro-3"
                    ><img src="assets/img/product/quickview-s3.jpg" alt=""
                  /></a>
                  <a data-toggle="tab" href="#pro-4"
                    ><img src="assets/img/product/quickview-s2.jpg" alt=""
                  /></a>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12">
              <div class="product-details-content quickview-content">
                <h2>Products Name Here</h2>
                <div class="product-details-price">
                  <span>$18.00 </span>
                  <span class="old">$20.00 </span>
                </div>
                <div class="pro-details-rating-wrap">
                  <div class="pro-details-rating">
                    <i class="fa fa-star-o yellow"></i>
                    <i class="fa fa-star-o yellow"></i>
                    <i class="fa fa-star-o yellow"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  </div>
                  <span>3 Reviews</span>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm
                  tempor incidid ut labore et dolore magna aliqua. Ut enim ad
                  minim venialo quis nostrud exercitation ullamco
                </p>
                <div class="pro-details-list">
                  <ul>
                    <li>- 0.5 mm Dail</li>
                    <li>- Inspired vector icons</li>
                    <li>- Very modern style</li>
                  </ul>
                </div>
                <div class="pro-details-size-color">
                  <div class="pro-details-color-wrap">
                    <span>Color</span>
                    <div class="pro-details-color-content">
                      <ul>
                        <li class="blue"></li>
                        <li class="maroon active"></li>
                        <li class="gray"></li>
                        <li class="green"></li>
                        <li class="yellow"></li>
                        <li class="white"></li>
                      </ul>
                    </div>
                  </div>
                  <div class="pro-details-size">
                    <span>Size</span>
                    <div class="pro-details-size-content">
                      <ul>
                        <li><a href="#">s</a></li>
                        <li><a href="#">m</a></li>
                        <li><a href="#">l</a></li>
                        <li><a href="#">xl</a></li>
                        <li><a href="#">xxl</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="pro-details-quality">
                  <div class="cart-plus-minus">
                    <input
                      class="cart-plus-minus-box"
                      type="text"
                      name="qtybutton"
                      value="2"
                    />
                  </div>
                  <div class="pro-details-cart btn-hover">
                    <a href="#">Add To Cart</a>
                  </div>
                  <div class="pro-details-wishlist">
                    <a href="#"><i class="fa fa-heart-o"></i></a>
                  </div>
                  <div class="pro-details-compare">
                    <a href="#"><i class="pe-7s-shuffle"></i></a>
                  </div>
                </div>
                <div class="pro-details-meta">
                  <span>Categories :</span>
                  <ul>
                    <li><a href="#">Minimal,</a></li>
                    <li><a href="#">Furniture,</a></li>
                    <li><a href="#">Fashion</a></li>
                  </ul>
                </div>
                <div class="pro-details-meta">
                  <span>Tag :</span>
                  <ul>
                    <li><a href="#">Fashion, </a></li>
                    <li><a href="#">Furniture,</a></li>
                    <li><a href="#">Electronic</a></li>
                  </ul>
                </div>
                <div class="pro-details-social">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Product_Modal",
};
</script>
