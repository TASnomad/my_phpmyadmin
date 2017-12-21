<nav>
    <div class="nav-wrapper cyan darken-1">
      <div class="row">
        <div class="col s12">
          <a href="index.php" class="brand-logo">DamboBarreauBriand'S PhpMyAdmin</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <?php
          if (isset($_SESSION['user']))
                {
                  echo '
                    <ul id="nav-mobile" class="right hide-on-med-and-down">\n
                      <li><a href="dashboard"><i class="material-icons left">pie_chart</i> Dashboard</a></li>\n
                      <li><a href="sentiment_analysis"><i class="material-icons left">donut_small</i> Sentiment Analysis</a></li>\n
                    </ul>\n
                    <ul class="side-nav" id="mobile-demo">\n
                      <li><a href="dashboard"><i class="material-icons">pie_chart</i> Dashboard</a></li>\n
                      <li><a href="sentiment_analysis"><i class="material-icons">donut_small</i> Sentiment Analysis</a></li>\n
                    </ul>';
                }
          ?>
        </div>
      </div>
    </div>
</nav>
