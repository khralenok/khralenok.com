<?php get_header(); ?>

<main>
    <section id="hero">
        <div class="container">
          <div class="component">
            <div class="wrapper">
                <div class="molecule vertical">
                  <h1><span class="highlight">Create websites</span> with&nbsp;your&nbsp;personal&nbsp;mentor</h1>
                  <p>Design, code and deploy websites for your business or  hobby project with ease.</p>
                </div>
                <ul>
                    <li>Get instant feedback and deep guidance</li>
                    <li>Master essential web technologies</li>
                    <li>Learn to bring your ideas to live</li>
                </ul>
                <div class = "molecule">
                  <a class="button" href="#contact-form">Want to learn!</a>
                </div>
              </div>
              <figure>
                <img width="624" height="624" alt="Your Mentor - Grigorii Khralenok" src="<?php echo get_theme_file_uri('images/avatar.webp')?>" />
              </figure>  
          </div>
        </div>
        <svg class="edge-decoration bottom" viewBox="0 0 1440 24"  xmlns="http://www.w3.org/2000/svg">
          <path d="M0 8 L720 0 V720 12 L1440 8 V1440 24 H24 0 V8 0" />
        </svg>
        </svg>

    </section>
          
    <section id="reviews" class="dark">
      <div class="container">
            <div class="title">
              <div class="molecule vertical">
                <h2>What my students say</h2>
              </div>
            </div>
            <div class="component reviews">
              <div class="carousel">
                <?php 
                $bulletsNum = 0;
                $homepageReviews = new WP_Query([
                  'post_per_page' => -1,
                  'post_type' => 'review'
                ]
                ); ?>
                <?php while($homepageReviews->have_posts()): ?>
                  <?php $homepageReviews->the_post(); ?>
                    <div class="card">
                      <?php the_content();?>
                      <div class="molecule">
                        <figure class="avatar"><img alt="<?php echo the_title()?>" width="64" height="64" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" loading="lazy"/></figure>
                        <div>
                          <a><b><?php echo the_title()?></b></a><br>
                          <a>
                            <?php for($i = 0; $i < 5; $i++){
                              echo $i < get_field('grade')?'<span class="grade">&#9733<span>' : '<span class="grade inactive">&#9733<span>';
                              };
                            ?> 
                          </a>
                        </div>
                        </a>
                      </div>
                    </div>
                    <?php $bulletsNum++; ?>
                <?php endwhile; ?>
                
              </div>
              <div class="arrow left">&larr;</div>
              <div class="arrow right">&rarr;</div>
              <div class="pagination"></div>
              <?php wp_reset_postdata();?>
          </div>
    </section> 

    <section id="subjects">
          <svg class="edge-decoration top" viewBox="0 0 1440 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1440 16 L720 24 L720 12 L0 20 L0 0 L1440 0 L1440 16"/>
          </svg>
          <div class="container">
            <div class="title">
              <div class="molecule vertical">
                <h2>What you could learn</h2>
              </div>
            </div>
            <div class="component">
              <div class="card">
                <div class="molecule">
                  <div class="avatar">
                      <img 
                      src="<?php echo get_theme_file_uri('images/icons_html.svg')?>"
                      alt="html"
                      loading="lazy"
                      />
                  </div>
                  <div class="wrapper">
                    <h3>HTML</h3>
                  </div>
                </div>
                <p>
                Learn how to structure your page to be human readable and SEO friendly.
                </p>
              </div>
              <div class="card">
                <div class="molecule">
                  <div class="avatar">
                      <img 
                      width="64" height="64"
                      src="<?php echo get_theme_file_uri('images/icons_figma.svg')?>"
                      alt="figma"
                      loading="lazy"
                      />
                  </div>
                  <div class="wrapper">
                    <h3>Figma</h3>
                  </div>
                </div>
                <p>
                Build development ready prototypes with most popular UI design tool.
                </p>
              </div>
              <div class="card">
                <div class="molecule">
                  <div class="avatar">
                      <img
                      width="64" height="64"
                      src="<?php echo get_theme_file_uri('images/icons_css.svg')?>"
                      alt="css"
                      loading="lazy"
                      />
                  </div>
                  <div class="wrapper">
                    <h3>CSS</h3>
                  </div>
                </div>
                <p>
                Transfer your design to real web page and make it live and breathe.
                </p>
              </div>
              <div class="card">
                <div class="molecule">
                  <div class="avatar">
                      <img
                      width="64" height="64"
                      src="<?php echo get_theme_file_uri('images/icons_js.svg')?>"
                      alt="JavaScript"
                      loading="lazy"
                      />
                  </div>
                  <div class="wrapper">
                    <h3>JavaScript</h3>
                  </div>
                </div>
                <p>
                Master magic of making your website responsive to visitors action.
                </p>
              </div>
              <div class="card">
                <div class="molecule">
                  <div class="avatar">
                      <img
                      width="64" height="64"
                      src="<?php echo get_theme_file_uri('images/icons_php.svg')?>"
                      alt="PHP"
                      loading="lazy"
                      />
                  </div>
                  <div class="wrapper">
                    <h3>PHP</h3>
                  </div>
                </div>
                <p>
                Know how manipulate templates, operate data and make truly live websites
                </p>
              </div>
              <div class="card">
                <div class="molecule">
                  <div class="avatar">
                      <img
                      width="64" height="64"
                      src="<?php echo get_theme_file_uri('images/icons_cms.svg')?>"
                      alt="Wordpress"
                      loading="lazy"
                      />
                  </div>
                  <div class="wrapper">
                    <h3>Wordpress</h3>
                  </div>
                </div>
                <p>
                Dive into features of one of most popular open source CMS which are only developers can enjoy
                </p>
              </div>
            </div>
          </div>
    </section>

    <section id="prices">
          <div class="container">
            <div class="title">
              <div class="molecule vertical">
                <h2>Simple pricing</h2>
              </div>
            </div>
            <div class="component prices">
              <div class="card">
                <h3>4 Lessons/Month</h3>
                <a class="price">$280</a>
                <p>
                Plan for those who comfortable to learn on their own and just want get feedback and guidance on this way
                </p>
              </div>
              <div class="card highlighted">
                <h3>8 Lessons/Month</h3>
                <a class="price">$520</a>
                <p>
                Perfect option for students who want to learn step by step with advance guidance and deep feedback.
                </p>
              </div>
              <div class="card">
                <h3>16 Lessons/Month</h3>
                <a class="price">$960</a>
                <p>
                Option for those who eager to jump into web development quickly and have courage and energy to run project as soon as possible.
                </p>
              </div>
            </div>
          </div>
    </section>

    <section id="contact-form">
      <div class="container">
        <div class="component">
          <div class="banner">
            <div class="title">
              <div class="molecule vertical">
                <h2>Eager to learn?</h2>
                <p>Once you submit the form, I'll get back to you within one business day.</p>
              </div>
            </div>              
            <form id="the-form">
              <div class="molecule vertical">
                  <label for="name">Enter your name:</label>
                  <input class="form-input" id="name" name="name" type="text" placeholder="John Smith" required>         
              </div>
              <div class="molecule vertical">
                  <label for="email">Enter your email:</label>
                  <input class="form-input" id="email" name="email" type="email" placeholder="john@smith.com" required>
              </div>
              <input class="form-input" id="fav-power-ranger" name="fav-power-ranger" type="text" value="red">
              <input class="button" type="submit" value="Let’s start!">
              <div id="form-status"></div>
            </form>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>