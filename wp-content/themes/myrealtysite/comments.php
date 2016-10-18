<?php 
  if (comments_open()) {
    if (get_comments_number() == 0) { ?>
      <h3 class="no-comments">Комментариев пока нет, но вы можете стать первым</h3>
    <?php } 
  else { ?>
    <div class="wrap-comments">
        <h3>Комментарии к статье "<?php the_title(); ?>"</h3>
        <!-- далее кодим здесь -->
    <?php

function mytheme_comment($comment, $args, $depth){
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <article class="comment-body" id="comment-<?php comment_ID(); ?>">
        
      <?php printf(__('<span class="author">%s</span>'), get_comment_author_link()) ?>
      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><span><?php printf(__('%1$s в %2$s'), get_comment_date(),  get_comment_time()) ?></span></a>
      <?php edit_comment_link(__('(Edit)'),'  ','') ?>
      <?php if ($comment->comment_approved == '0') { ?>
      <em><?php _e('Ваш комментарий ожидает модерации.') ?></em>
      <br />
      <?php }else{comment_text();} ?>
      <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
    </article>
<?php
}
?>

    <ol class="commentlist">
  		<?php wp_list_comments(array('callback'=>'mytheme_comment')); ?>
		</ol>
		<div class="pagging">
      <?php paginate_comments_links( array('prev_text' => '«', 'next_text' => '»') ); ?>
    </div>
  </div>
  <?php } 
  } else { ?>
    <h3>Обсуждения закрыты для данной страницы</h3>
  <?php 
} 
?>


<?php if ('open' == $post->comment_status) : ?>
<div id="respond">

<h3><?php comment_form_title( 'Оставьте свой отзыв', 'Ответить %s' ); ?></h3>

<div class="cancel-comment-reply">
    <small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Вы должны быть <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">авторизированы</a> чтобы оставить комментарий</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Вы вошли как &nbsp;<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.&nbsp; <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"> Выйти &raquo;</a></p>

<?php else : ?>
<label for="author">Имя <?php if ($req) echo "(обязательно)"; ?></label>
<input type="text" name="author" id="author" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> <?php echo "placeholder='Введите имя'"; ?> />

<label for="email">Email (не будет опубликовано) <?php if ($req) echo "(обязательно)"; ?></label>
<input type="text" name="email" id="email" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> <?php echo "placeholder='Введите email'"; ?>/>



<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Вы можете использовать теги: <code><?php echo allowed_tags(); ?></code></small></p>-->

<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="3" <?php echo "placeholder='Введите комментарий'"; ?>></textarea>

<input name="submit" type="submit" id="submit" class="submit_btn дуае"tabindex="4" value="Отправить" />
<?php comment_id_fields(); ?>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>