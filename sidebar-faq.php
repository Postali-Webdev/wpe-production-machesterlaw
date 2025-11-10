<?php
$term_taxonomy = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$termname = $term_taxonomy->name;
?>
<div class="blog-sidebar">
<div class="sidebar-categories">
    <div class="title text-left">FAQs Categories</div>
    <ul>
        <?php
        $taxonomy = array(
            "faq-category",
        );
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => false,
            'parent' => 0,
            'hierarchical' => true,
            'child_of' => 0,
            'childless' => false,
        );
        $terms = get_terms($taxonomy, $args);
        foreach ($terms as $term) {
            ?>
            <li class="<?php
            if ($termname == $term->name) {
                echo 'active';
            }
            ?>"><a href="/faq-category/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>  
            <?php }
            ?>
    </ul>
	</div>
</div>