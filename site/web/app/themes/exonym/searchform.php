<?php
  global $wp_query;
  $searchResultCount = $wp_query->found_posts;
  $searchQuery = get_search_query();
  $catSearch = get_query_var('package_categories');
  $catName = get_term_by('slug', $catSearch, 'package_categories');
?>
<form id="search-form" class="search-form" action="<?php echo get_home_url(); ?>">
  <div class="search-form-left">
    <h1>Search Packages</h1>
    <?php if(!empty($searchQuery)): ?>
      <p>
        Showing search results for <strong><?php echo $searchQuery; ?></strong>
        <?php if(!empty($catSearch) && $catName): ?>
          in the <strong id="cat-target" data-cat="<?php echo $catName->slug; ?>"><?php echo $catName->name; ?></strong> category
        <?php endif; ?>
      </p>
    <?php else: ?>
      <?php if(!empty($catSearch) && $catName): ?>
        <p id="cat-target" data-cat="<?php echo $catName->slug; ?>">Browsing the <strong><?php echo $catName->name; ?></strong> category</p>
      <?php else: ?>
        <p>All packages listed below. Use the search or categories to browse specific packages.</p>
      <?php endif; ?>
    <?php endif; ?>
    <input name="s" type="text" value="<?php echo get_search_query(); ?>" placeholder="Search by Keyword">
  </div>
<div class="search-form-cats">
  <?php
  $taxonomyName = 'package_categories';
  $terms = get_terms($taxonomyName,array('parent' => 0));
  foreach($terms as $term) {
    echo '<h3 class="search-form-list-parent search-form-cat" id="cat-' . $term->slug . '">' . $term->name . '</h3>';
    $term_children = get_term_children($term->term_id,$taxonomyName);
    echo '<ul class="search-form-list-children">';
    foreach($term_children as $term_child_id) {
      $term_child = get_term_by('id',$term_child_id,$taxonomyName);
      echo '<li class="search-form-cat" id="cat-' . $term_child->slug . '">' . $term_child->name . '</li>';
    }
    echo '</ul>';
  }
  ?>
</div>

  <input type="hidden" name="post_type" value="package">
  <input id="cat-hidden" type="hidden" name="package_categories" value="">
  <button type="submit">Search</button>
</form>
<section class="search-results-info">
  <?php if($searchResultCount > 0): ?>
    Found <?php echo $searchResultCount; ?> <?php if($searchResultCount == 1) { echo 'result'; } else { echo 'results'; } ?> listed below
  <?php else: ?>
    No Results found. Try narrowing down your search.
  <?php endif; ?>
</section>
