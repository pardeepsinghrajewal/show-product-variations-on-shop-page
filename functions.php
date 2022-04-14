<?php 
function wcShowVariationOnShop( $query ) 
{
  if( !is_admin() && isset($query->query_vars['wc_query']) ) 
  {
    $empty = array(); 
    $postTypes = array('product_variation');
    $query->set( 'post_type', $postTypes );
  }
}
add_filter( 'pre_get_posts', 'wcShowVariationOnShop',999999 );

function wcSearchvariation( $clauses, $query ) 
{
  global $wpdb;
  
  if( !is_admin() && isset($query->query_vars['wc_query']) ) 
  {
    $clauses['where'] = str_replace('product_or_parent_id','product_id',$clauses['where']);
  }
  return $clauses;
}
add_filter( 'posts_clauses', 'wcSearchvariation', 99999, 2 );