<?php
/**
 * Project: Rojgar Sangam Optimization
 * These snippets handle SEO, performance, and custom UI features for WordPress.
 */

// 1. Social Share Buttons Shortcode
// 2. Search Results Count & Dynamic Year/Month Shortcodes
// 3. Custom Table of Contents (TOC) for SEO
// 4. Automatic Image Dimensions for Core Web Vitals

// Paste your 4 codes below...

// 1. Social Share Buttons Shortcode
add_shortcode('social_share_buttons', function() {
    if (!is_singular()) {
        return ''; 
    }
    $u = urlencode(get_permalink());
    $t = urlencode(get_the_title());
    $output = '
    <div class="social-share-wrapper">
        <h2>If you liked it, share it with others.</h2>
        <p class="share-message"><strong>Tell your friends, family and neighbours. Heck, share it with the whole world!</strong></p>
        <div class="social-share-buttons">
            <a class="social-button fb" href="https://www.facebook.com/sharer/sharer.php?u='.$u.'" target="_blank" rel="noopener" aria-label="Share on Facebook"><svg width="20" height="20" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.127V8.413c0-3.1 1.894-4.785 4.659-4.785 1.325 0 2.464.099 2.794.143v3.24h-1.918c-1.504 0-1.794.714-1.794 1.763v2.31h3.587l-.467 3.622h-3.12V24h6.116C23.407 24 24 23.407 24 22.675V1.325C24 .593 23.407 0 22.675 0z"/></svg>Facebook</a>
            <a class="social-button x" href="https://twitter.com/intent/tweet?url='.$u.'&text='.$t.'" target="_blank" rel="noopener" aria-label="Share on X"><svg width="20" height="20" viewBox="0 0 1200 1227"><path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"/></svg>X</a>
            <a class="social-button li" href="https://www.linkedin.com/shareArticle?mini=true&url='.$u.'&title='.$t.'" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg width="20" height="20" viewBox="0 0 24 24"><path d="M22.23 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.46C23.21 24 24 23.23 24 22.27V1.73C24 .77 23.21 0 22.23 0zM7.12 20.45H3.56V9.02h3.56v11.43zM5.34 7.65c-1.14 0-2.06-.92-2.06-2.06 0-1.14.92-2.06 2.06-2.06s2.06.92 2.06 2.06c0 1.14-.92 2.06-2.06 2.06zM20.45 20.45h-3.56v-5.84c0-1.39-.03-3.18-1.94-3.18-1.94 0-2.24 1.51-2.24 3.07v5.95H9.02V9.02h3.42v1.56h.05c.48-.91 1.66-1.87 3.42-1.87 3.65 0 4.33 2.4 4.33 5.52v6.22z"/></svg>LinkedIn</a>
            <a class="social-button wa" href="https://api.whatsapp.com/send?text='.$t.'%20'.$u.'" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><svg width="20" height="20" viewBox="0 0 32 32"><path d="M16.003 2.003c-7.732 0-14 6.268-14 14 0 2.464.644 4.894 1.868 7.027L2 30l7.218-1.833c1.99 1.089 4.226 1.66 6.785 1.66 7.732 0 14-6.268 14-14s-6.267-14-14-14zM16 26.908c-2.111 0-4.162-.561-5.972-1.625l-.427-.252-4.282 1.088 1.138-4.175-.278-.438c-1.128-1.779-1.727-3.831-1.727-5.737 0-6.066 4.935-11 11-11s11 4.934 11 11-4.934 11-11 11zm6.05-8.178c-.33-.165-1.95-.963-2.253-1.07-.302-.11-.522-.165-.742.165-.22.33-.853 1.07-1.047 1.29-.193.22-.385.247-.715.082-.33-.165-1.396-.515-2.66-1.646-.984-.878-1.646-1.963-1.84-2.293-.193-.33-.021-.508.145-.673.15-.15.33-.385.495-.577.165-.193.22-.33.33-.55.11-.22.055-.412-.027-.577-.083-.165-.742-1.792-1.017-2.464-.267-.64-.538-.55-.742-.56l-.633-.01c-.22 0-.577.082-.88.412-.302.33-1.157 1.13-1.157 2.754s1.184 3.193 1.348 3.417c.165.22 2.33 3.56 5.65 4.994.79.34 1.405.543 1.887.695.793.252 1.515.217 2.086.132.637-.095 1.95-.797 2.226-1.566.275-.77.275-1.43.193-1.566-.082-.137-.302-.22-.633-.385z"/></svg>WhatsApp</a>
            <a class="social-button tg" href="https://t.me/share/url?url='.$u.'&text='.$t.'" target="_blank" rel="noopener" aria-label="Share on Telegram"><svg width="20" height="20" viewBox="0 0 24 24"><path d="M9.999 15.996 9.66 20.308c.51 0 .734-.221.999-.487l2.399-2.302 4.976 3.632c.911.502 1.561.239 1.796-.843l3.252-15.204c.297-1.38-.527-1.922-1.41-1.591L1.342 9.178c-1.354.528-1.335 1.281-.23 1.619l5.946 1.856 13.793-8.683c.649-.41 1.24-.189.754.221L9.999 15.996z"/></svg>Telegram</a>
        </div>
    </div>
    <style>
    .social-share-wrapper{margin:25px 0}h2{font-size:25px;color:#313131;margin-bottom:8px}.share-message{font-size:15px;margin-bottom:12px;color:#313131;line-height:1.5}.social-share-buttons{display:flex;gap:10px;flex-wrap:wrap}.social-button{display:inline-flex;align-items:center;gap:5px;padding:7px 11px;background:#EFF6EF;color:#313131;text-decoration:none;border-radius:5px;border:1px solid #667799;font-size:16px;transition:.2s ease-in-out;white-space:nowrap}.social-button svg{fill:#555}.social-button:hover{background:#FDECE5}.social-button:hover svg{fill:#313131}
    </style>';
    return $output;
});

// 2. Search Results Count & Dynamic Year/Month Shortcodes
function pa_search_results_count_shortcode($atts){global $wp_query;return $wp_query->found_posts.' results for "'.get_search_query().'" in (0.27 Seconds)';}add_shortcode('pa_search_results_count','pa_search_results_count_shortcode');
add_shortcode('year',function(){return date_i18n('Y');});
add_shortcode('month',function(){return date_i18n('F');});
add_shortcode('monthyear',function(){return date_i18n('F Y');});
add_shortcode('day',function(){return date_i18n('l');});
add_filter( 'the_content', 'do_shortcode', 11 );
add_filter( 'widget_text', 'do_shortcode', 11 );
add_filter( 'the_title', 'do_shortcode', 11 );

// 4. Custom Table of Contents (TOC) for SEO
add_filter( 'the_content', 'add_ids_to_headings', 1 ); 
function add_ids_to_headings( $content ) {
    if ( ! class_exists( 'DOMDocument' ) || !is_single() || !is_main_query() ) {
        return $content;
    }
    $dom = new DOMDocument();
    $load_content = '<?xml encoding="UTF-8">' . mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' );
    libxml_use_internal_errors(true);
    @$dom->loadHTML( $load_content );
    libxml_use_internal_errors(false);    
    $xpath    = new DOMXPath( $dom );
    $headings = $xpath->query( '//h2' );
    if ( $headings->length === 0 ) {
        return $content;
    }
    foreach ( $headings as $heading ) {
        $heading_id = $heading->getAttribute( 'id' );
        if ( empty( $heading_id ) ) {
            $old_heading = $heading->C14N();
            $heading_id  = sanitize_title_with_dashes( $heading->nodeValue ); 
            $heading->setAttribute( 'id', $heading_id );
            $content = str_replace( $old_heading, $heading->C14N(), $content );
        }
    }
    return $content; 
}
function display_table_of_contents_shortcode() {
    global $post;
    if ( empty( $post ) || !is_singular() ) {
        return '';
    }
    $content = apply_filters( 'the_content', $post->post_content ); 
    if ( ! class_exists( 'DOMDocument' ) ) {
        return '';
    }
    $dom = new DOMDocument();
    $load_content = '<div id="toc-wrapper">' . $content . '</div>';
    $load_content = '<?xml encoding="UTF-8">' . mb_convert_encoding( $load_content, 'HTML-ENTITIES', 'UTF-8' );
    libxml_use_internal_errors(true);
    @$dom->loadHTML( $load_content );
    libxml_use_internal_errors(false);
    $xpath    = new DOMXPath( $dom );
    $headings = $xpath->query( '//h2' );
    if ( $headings->length === 0 ) {
        return '';
    }
    $headings_list = '<div class="table-of-contents" data-rank-math-toc-plugin="custom-toc/custom-toc" style="padding: 0px 12px 0px 15px!important;text-align: left!important; border: 1px solid #667799!important; border-radius: 15px!important;background-color:#f9f9f9!important;">';
    $headings_list .= '<h3 style="margin-top: 5px; font-size: 23px;">Table of Contents</h3>';    
    $found_heading = false;
    $counter = 1;     
    foreach ( $headings as $heading ) {
        $heading_id = $heading->getAttribute( 'id' );        
        if ( ! empty( $heading_id ) && $heading->nodeValue ) {
            $heading_text  = $heading->nodeValue;
            $headings_list .= '<li style="margin-bottom: 8px; display: flex; align-items: flex-start;">';
            $headings_list .= '<span style="margin-top: 0.5em;display: inline-flex; justify-content: center; align-items: center; width: 22px; height: 22px; border: 2px solid #667799;border-radius:50%;color:#313131;font-size: 0.6em;margin-right: 8px; flex-shrink: 0; font-weight:bold;">' . $counter . '</span>';
            $headings_list .= '<a href="#' . $heading_id . '" style="font-weight:bold; line-height: 1.6;">' . htmlspecialchars( $heading_text, ENT_QUOTES, 'UTF-8' ) . '</a>';
            $headings_list .= '</li>';            
            $found_heading = true;
            $counter++;
        }
    }
    $headings_list .= '</ul></div>';
    if (!$found_heading) {
        return '';
    }
	return $headings_list;
}
add_shortcode( 'toc', 'display_table_of_contents_shortcode' );

// 4. Automatic Image Dimensions for Core Web Vitals
<style>img{max-width:100%;height:auto;display:inline-block}header img,footer img{max-width:none;display:inline-block}</style><script>document.addEventListener("DOMContentLoaded",()=>{document.querySelectorAll("img").forEach(i=>{if(i.closest("header")||i.closest("footer"))return;if(!i.hasAttribute("width")||!i.hasAttribute("height"))i.naturalWidth&&i.naturalHeight&&(i.setAttribute("width",i.naturalWidth),i.setAttribute("height",i.naturalHeight));})});</script>
