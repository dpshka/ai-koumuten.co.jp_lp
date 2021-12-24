<?php
add_filter( 'big_image_size_threshold', '__return_false' );
//jetpackで読まれているCSSを削除
add_filter('jetpack_implode_frontend_css','__return_false' );

/* インラインスタイル削除 */
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );
add_theme_support( 'post-thumbnails' ); //サムネイルをサポートさせる。


//勝手に読み込まれるJSを削除


function dequeue_css_header() {
  wp_dequeue_style('wp-pagenavi');
  wp_dequeue_style('bodhi-svgs-attachment');
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('dashicons');
  wp_dequeue_style('addtoany');
  
}
add_action('wp_enqueue_scripts', 'dequeue_css_header');
//CSSファイルをフッターに出力
function enqueue_css_footer(){

  wp_enqueue_style('wp-block-library');

  wp_enqueue_style('addtoany');
}
add_action('wp_footer', 'enqueue_css_footer');

if(is_admin()) {    
}
else {

    function my_delete_local_jquery() {
        wp_deregister_script('jquery');
    }
    add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );
}

//レンダリングをブロックするのを止めましょう。
if (!(is_admin() )) {
function add_defer_to_enqueue_script( $url ) {
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.min.js' ) ) return $url;
    return "$url' defer charset='UTF-8";
}
add_filter( 'clean_url', 'add_defer_to_enqueue_script', 11, 1 );
}

remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');

//子カテゴリーも親カテゴリーと同様の設定を行う
add_filter( 'category_template', 'my_category_template' );
function my_category_template( $template ) {
    $category = get_queried_object();
    if ( $category->parent != 0 &&
        ( $template == "" || strpos( $template, "category.php" ) !== false ) ) {
        $templates = array();
        while ( $category->parent ) {
                $category = get_category( $category->parent );
                if ( !isset( $category->slug ) ) break;
                $templates[] = "category-{$category->slug}.php";
                $templates[] = "category-{$category->term_id}.php";
        }
        $templates[] = "category.php";
        $template = locate_template( $templates );
    }
    return $template;
}


//子カテゴリーで抽出を行う方法
function post_is_in_descendant_category( $cats, $_post = null ){
   foreach ( (array) $cats as $cat ) {
        $descendants = get_term_children( (int) $cat, 'category');
        if ( $descendants && in_category( $descendants, $_post ) )
        return true;
   }
   return false;
}


//アクセス数の取得
function get_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );

        return "0 views";
    }

    return $count . '';
}

//アクセス数の保存
function set_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function amp_breadcrumblist(){
    $home_url = home_url('/');
    $category_data = get_the_category();
    if(is_category()){
        $cat_url = get_category_link( $cat ).'?amp=1';
        $cat_name = $category_data[0]->cat_name;
    }elseif(is_single()){
        $category_info = get_the_category();
        $cat_url = get_category_link( $category_info[0]->cat_ID ).'?amp=1';
        $cat_name = $category_info[0]->cat_name;
    }

    
    $posttitle = get_the_title(get_the_ID());
    $posturl = get_the_permalink(get_the_ID()).'?amp=1';
    if(is_home()){        
$contents =  <<<EOD
    {
        "@type": "ListItem",
        "position": 1,
        "item": {
                    "@id": "{$home_url}",
                    "name": "TOP"
                }
    }
EOD;
    }elseif(is_category()){
$contents =  <<<EOD
    {
        "@type": "ListItem",
        "position": 1,
        "item": {
                    "@id": "{$home_url}",
                    "name": "TOP"
                }
    },{
        "@type": "ListItem",
        "position": 2,
        "item": {
                    "@id": "{$cat_url}",
                    "name": "{$cat_name}"
                }
    }
EOD;
    }elseif(is_single()){
$contents =  <<<EOD
    {
        "@type": "ListItem",
        "position": 1,
        "item": {
                    "@id": "{$home_url}",
                    "name": "TOP"
                }
    },{
        "@type": "ListItem",
        "position": 2,
        "item": {
                    "@id": "{$cat_url}",
                    "name": "{$cat_name}"
                }
    },{
        "@type": "ListItem",
        "position": 3,
        "item": {
                    "@id": "{$posturl}",
                    "name": "{$posttitle}"
                }
    }
EOD;
                    
    }elseif(is_page()) {
$contents =  <<<EOD
    {
        "@type": "ListItem",
        "position": 1,
        "item": {
                    "@id": "{$home_url}",
                    "name": "TOP"
                }
    },{
        "@type": "ListItem",
        "position": 2,
        "item": {
                    "@id": "{$posturl}",
                    "name": "{$posttitle}"
                }
    }
EOD;
    }
    
    return $contents;
}


add_filter( 'wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2 );
function my_wp_kses_allowed_html( $tags, $context ) {
	$tags['img']['srcset'] = true;
        $tags['source']['srcset'] = true;
        $tags['source']['data-srcset'] = true;
	return $tags;
}


function get_sfc_img($name){
    $cf_sample = wp_get_attachment_image_src($name,'full');
    return $cf_sample;
}

function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}

add_filter( 'mwform_choices_mw-wp-form-17', 'add_select_17', 10, 2 );
function add_select_17( $children, $atts ) {
    if ( $atts['name'] == '分譲地名' ) {
        $cf_group = SCF::get('contact_subdivision',17);
        $children[] = "ご希望の展示場を選択してください";
        foreach ($cf_group as $field_name => $field_value ){
            $name = $field_value['contact_subdivision_name'];
            $children[$name] = $name;
        }
    }
    return $children;
}
add_filter( 'mwform_choices_mw-wp-form-18', 'add_select_18', 10, 2 );
function add_select_18( $children, $atts ) {
    if ( $atts['name'] == '分譲地名' ) {
        $children[] = "ご希望の展示場を選択してください";
        $cf_group = SCF::get('contact_subdivision',18);
        foreach ($cf_group as $field_name => $field_value ){
            $name = $field_value['contact_subdivision_name'];
            $children[$name] = $name;
        }
    }
    return $children;
}

function SetUrl() {
	$nowurl =  (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if(strpos($nowurl,'wakayama') !== false) {
		$output_action = "和歌山支店";
	}
	else {
		$output_action = "阪和支店";
	}
	echo $output_action;
}

function get_scf_img_loop_url($name) {
    $cf_sample = wp_get_attachment_image_src($name, 'full');
    return $cf_sample;
}

function autoback_my_mail( $Mail_raw, $values, $Data ) {
    if ($Data->get( '分譲地名' ) == '中百舌鳥展示場')
    {
        $Mail_raw->to = 'mailA@higezine.com';
    } 
    else if ($Data->get( '分譲地名' ) == '堺美原展示場')
    {
        $Mail_raw->to = 'mailB@higezine.com';
    } 
    else if ($Data->get( 'お問い合わせの種類' ) == 'その他')
    {
        $Mail_raw->to = 'mailC@higezine.com';
    }
    return $Mail_raw;
}
add_filter( 'mwform_admin_mail_mw-wp-form-18', 'autoback_my_mail', 10, 3 );