<?php

get_header();


?>
    <section class="uza-portfolio-area section-padding-80">
		<?php
		get_template_part( 'template-parts/portfolio/portfolio-filter', 'portfolio-filter');
		get_template_part( 'template-parts/portfolio/portfolio-loop', 'portfolio-loop');
		?>
    </section>
    <section class="uza-newsletter-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="nl-content mb-80">
                        <h2>Subscribe to our Newsletter</h2>
                        <p>Subscribe our newsletter gor get notification about new updates, etc...</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="nl-form mb-80">
                        <form action="#" method="post">
                            <input type="email" name="nl-email" value="" placeholder="Your Email">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="border-line"></div>
        </div>
    </section>
<?php
get_footer();