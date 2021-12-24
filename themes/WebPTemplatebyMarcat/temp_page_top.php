<?php
    /**
     * Template Name: アイ工務店それぞれのトップページ
     * Template Post Type: page
     */
?>
<?php get_header(); ?>
<?php remove_filter ('the_content', 'wpautop'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
<main class="page_<?php echo $post->post_name; ?>">
    <section class="page_top_slider_cnt">
        <ul class="ul_page_top_slider_cnt js_page_top_slider_cnt">
            <?php $cf_group = SCF::get('page_sliders'); ?>
            <?php foreach ($cf_group as $field_name => $field_value ): ?>
            <li class="li_page_top_slider_cnt">
                <?php if(!empty($field_value['page_slider_url'])): ?>
                <a class="button_page_top_slider_cnt" href="<?php echo $field_value['page_slider_url']; ?>" target="<?php echo $field_value['page_slider_target']; ?>">
                    <?php $img = get_sfc_img($field_value['page_slider_img']); ?>
                    <img src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>スライダー画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                </a>
                <?php else: ?>
                    <?php $img = get_sfc_img($field_value['page_slider_img']); ?>
                    <img src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>スライダー画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    
<?php if(!empty(SCF::get('page_fv_bottom_img'))): ?>
    <figure class="page_top_slider_bottom_img">
    	<?php if(!empty(SCF::get('fv_bottom_url'))): ?>
    		<a href="<?php echo SCF::get('fv_bottom_url'); ?>" target=<?php echo SCF::get('fv_bottom_target'); ?>">
    	<?php endif; ?>
        <?php $img = get_sfc_img(SCF::get('page_fv_bottom_img')); ?>
        <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
        <?php if(!empty(SCF::get('fv_bottom_url'))): ?>
        	</a>
        <?php endif; ?>
    </figure>
<?php endif; ?>    	
    <?php foreach( scf::get('SliderBottomCnt') as $field ): ?>
    <figure class="page_top_slider_bottom_img">
    	<?php if(!empty($field['SliderBottomCntLink'])): ?>
    		<a href="<?php echo $field['SliderBottomCntLink']; ?>" target="<?php echo $field['SliderBottomCntTarget']; ?>">
    	<?php endif; ?>
    	<?php $img = get_scf_img_loop_url($field['SliderBottomCntImg']); ?>
    	<img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
    	<?php if(!empty($field['SliderBottomCntLink'])): ?><?php endif; ?>
    </figure>
    <?php endforeach; ?>
    	
    <div class="ma_20 page_top_subdivision_top_wap">
        <figure class="w_262 page_top_subdivision_top">
            <?php $img = get_sfc_img(SCF::get('txt_page_fv_bottom_img')); ?>
            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
        </figure>
    </div>
    
    <section class="w_350 ma_20 subdivision_info">
        <h1 class="h1_subdivision_info_cnt">
            <?php $img = get_sfc_img(SCF::get('title_page_area_img')); ?>
            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
        </h1>
        <ul class="ul_subdivision_info">
            <?php $cf_group = SCF::get('page_areas_info'); ?>
            <?php foreach ($cf_group as $field_name => $field_value ): ?>
            <li class="li_subdivision_info">
                <figure class="photo_li_subdivision_info">
                    <?php $img = get_sfc_img($field_value['page_area_info_img']); ?>
                    <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
                </figure>
                <p class="ma_10 fs_17_17 li_17_27 top_txt_li_subdivision_info"><?php echo nl2br($field_value['page_area_info_top_txt']); ?></p>
                <h2 class="ma_10 fs_30_30 title_li_subdivision_info">
                    <?php echo $field_value['page_area_info_name']; ?>
                    <?php if(!empty($field_value['page_area_info_name_tyusyaku'])): ?>
                    <span class="fw_400 fs_14_14 span_title_li_subdivision_info"><?php echo $field_value['page_area_info_name_tyusyaku']; ?></span>
                    <?php endif; ?>
                </h2>
                <p class="ma_10 fs_14_14 li_14_20 bottom_text_li_subdivision_info"><?php echo nl2br($field_value['page_area_info_address']); ?></p>
                <?php if(!empty($field_value['page_area_info_tel'])): ?>
                <p class="ma_10 fw_600 fs_20_20 tel_li_subdivision_info">
        <a class="button_tel_li_subdivision_info" href="tel:<?php echo $field_value['page_area_info_tel']; ?>" onclick="gtag('event', 'tel', {'event_category': '電話お問合せ','event_label': '<?php SetUrl(); ?>'});">TEL:<?php echo $field_value['page_area_info_tel']; ?></a>
        		</p>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <figure class="bottom_photo_subdivision_info">
            <?php $img = get_sfc_img(SCF::get('page_area_bottom_img')); ?>
            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
        </figure>
    </section>
    
    <ul class="page_csv">
        <?php $cf_group = SCF::get('page_cvs_contents'); ?>
        <?php foreach ($cf_group as $field_name => $field_value ): ?>            
            <li class="li_page_csv">
                <a class="button_li_page_csv" href="<?php echo $field_value['page_cvs_content_link']; ?>" target="<?php echo $field_value['page_cvs_content_target']; ?>">
                    <?php $img = get_sfc_img($field_value['page_cvs_content_img']); ?>
                    <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>ボタン画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    
    <?php $cf_group = SCF::get('page_characteristics'); ?>
    <?php foreach ($cf_group as $field_name => $field_value ): ?>
    <figure class="characteristics_photo">
        <?php $img = get_sfc_img($field_value['page_characteristic_img']); ?>
        <img loading="lazy" src="<?php echo $img[0]; ?>" alt="アイ工務店<?php echo get_the_title($post->ID); ?>エリアの特徴" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
    </figure>
    <?php endforeach; ?>
    
    
    <div class="page_top_subdivision_top_wap page_top_subdivision_top_wap_02">
        <figure class="page_top_subdivision_top">
            <?php $img = get_sfc_img(SCF::get('txt_page_fv_bottom_img')); ?>
            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
        </figure>
    </div>

    <ul class="page_csv">
        <?php $cf_group = SCF::get('page_cvs_contents'); ?>
        <?php foreach ($cf_group as $field_name => $field_value ): ?>            
            <li class="li_page_csv">
                <a class="button_li_page_csv" href="<?php echo $field_value['page_cvs_content_link']; ?>" target="<?php echo $field_value['page_cvs_content_target']; ?>">
                    <?php $img = get_sfc_img($field_value['page_cvs_content_img']); ?>
                    <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>ボタン画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" />
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>