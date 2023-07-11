<section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php foreach($regime as $rg ){ ?>
                
                <div class="col-lg-4">
                    <div class="item">
                        <a href="<?php echo site_url('/Control_program/detail') ?>?id_regime=<?php  echo $rg->id_regime?>&id_sport=<?php  echo $rg->id_sport?> &id_program=<?php  echo $rg->id?>">
                        
                            <h4><?php  echo $rg->id?></h4>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                        </a>
                    </div>
                </div>
                </a>
                <?php } ?>
                
            </div>
        </div>
    </section>