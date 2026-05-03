<?php
/**
 * @var \App\View\AppView $this
 */
?>
<footer>
    <?php if ($this->request->getParam('action') === 'home') : ?>
        <div class="payment-methods">
            <div class="container text-center">
                <?php foreach (get_withdrawal_methods() as $method) : ?>
                    <?php if ($method['image']) : ?>
                        <?= $this->Assets->image($method['image']); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="copyright-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 bottom-menu">
                    <?=
                    menu_display('menu_footer', [
                        'ul_class' => 'list-inline',
                        'li_class' => '',
                        'a_class' => '',
                    ]);
                    ?>
                </div>
                <div class="col-sm-4 social-links">
                    <ul class="list-inline">
                        <?php if (get_option('facebook_url')) : ?>
                            <li><a href="<?= h(get_option('facebook_url')) ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>
                        <?php if (get_option('twitter_url')) : ?>
                            <li><a href="<?= h(get_option('twitter_url')) ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if (get_option('google_plus_url')) : ?>
                            <li><a href="<?= h(get_option('google_plus_url')) ?>"><i class="fa fa-google-plus"></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-sm-4 copyright">
                    <div><?= __('Copyright &copy;') ?> <?= h(get_option('site_name')) ?> <?= date("Y") ?></div>

                </div>
            </div>
        </div>
    </div>
</footer>

<?= $this->element('js_vars'); ?>

<script data-cfasync="false" src="<?= $this->Assets->url('/js/ads.js') ?>"></script>

<?php
if ((bool)get_option('combine_minify_css_js', false)) {
    echo $this->Assets->script('/build/js/script.min.js?ver=' . APP_VERSION);
} else {
    echo $this->Assets->script('/vendor/jquery.min.js?ver=' . APP_VERSION);
    echo $this->Assets->script('/vendor/bootstrap/js/bootstrap.min.js?ver=' . APP_VERSION);
    echo $this->Assets->script('/vendor/owl/owl.carousel.min.js?ver=' . APP_VERSION);
    echo $this->Assets->script('/vendor/wow.min.js?ver=' . APP_VERSION);
    echo $this->Assets->script('/vendor/clipboard.min.js?ver=' . APP_VERSION);
    echo $this->Assets->script('/js/front.js?ver=' . APP_VERSION);
    echo $this->Assets->script('/js/app.js?ver=' . APP_VERSION);
}
?>

<?php if (in_array(get_option('captcha_type', 'recaptcha'), ['recaptcha', 'invisible-recaptcha'])) : ?>
    <script src="https://www.recaptcha.net/recaptcha/api.js?onload=onloadRecaptchaCallback&render=explicit"
            async defer></script>
<?php endif; ?>

<?php if (get_option('captcha_type') == 'solvemedia') : ?>
    <script language="javascript" type="text/javascript">
      var script = document.createElement('script');
      script.type = 'text/javascript';

      if (location.protocol === 'https:') {
        script.src = 'https://api-secure.solvemedia.com/papi/challenge.ajax';
      } else {
        script.src = 'http://api.solvemedia.com/papi/challenge.ajax';
      }
      document.body.appendChild(script);
    </script>
<?php endif; ?>

<?= $this->fetch('scriptBottom') ?>
<?= get_option('footer_code'); ?>
