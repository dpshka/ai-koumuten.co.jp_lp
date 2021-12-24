<?php if(is_page(array(11,14))): ?>
<div class="footer">
    <div class="display_flex_center footer_logo">
        <figure class="footer_logo">
            <img src="<?php echo get_bloginfo('template_url'); ?>/img/footer_logo.svg" alt="アイ工務店フッターロゴ" width="" height="">
        </figure>
    </div>
    <p class="t_center footer_privacy_link">
        <a class="button_footer_privacy_link" href="https://www.ai-koumuten.co.jp/privacy.html" target="_blank">プライバシーポリシー</a>
    </p>
    <p class="t_center footer_address">Copyright © 2010- AI-KOUMUTEN. All Rights Reserved.</p>
</div>
<?php else: ?>
<div class="footer_ma">
    <?php $img = get_sfc_img(SCF::get('contact_footer_img',get_the_ID())); ?>
    <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
</div>
<?php endif; ?>
