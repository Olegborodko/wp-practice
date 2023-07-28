<form method="get" action="<?= home_url("/"); ?>">
  <input type="text" name="s" value="<?php the_search_query(); ?>" />
  <input type="submit" />
  <input type="hidden" value="post" name="post_type" /> <!-- искать только в постах 

  за сам поиск отвечает файл search.php

-->
</form>