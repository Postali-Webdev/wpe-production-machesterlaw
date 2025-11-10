<?php if (have_rows('faq_tab')): ?>
   <script type="application/ld+json">
       {
       "@context": "https://schema.org",
       "@type": "FAQPage",
       "mainEntity": [
       <?php
       $count = 1;
       $array = get_field('faq_tab');
       $counts = 0;
       foreach ($array as $key => $value) {
           $counts++;
       }
       if (have_rows('faq_tab')):
           while (have_rows('faq_tab')): the_row();
               ?>
               {
               "@type": "Question",
               "name": "<?php echo get_sub_field('question'); ?>",
               "acceptedAnswer": {
               "@type": "Answer",
               "text": "<?php echo strip_tags(get_sub_field('answer_schema')); ?>"
               }
               }<?php if ($count < $counts) { ?> , <?php } ?>
               <?php
               $count++;

           endwhile;
       endif;
       ?>  
       ]
       }
   </script>
<?php endif; ?>