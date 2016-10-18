<?php 
/*
Template Name: Contact Page
*/
get_header(); ?>

		<div class="main_outer">
			<div class="main_content">
				<div class="content_wrapper">
					<section class="contacts">
						<?php the_title( '<h1>', '</h1>' ); ?>  
						<header>Свяжитесь со мной одним из способов, поданных ниже.</header>
						<div class="tel">
							<p class="ks">+380 67 795 91 69</p>
							<p class="mts">+380 66 066 47 92</p>
						</div>     
						<?php the_post(); ?>
						<?php the_content(); ?>
						
						<form action="<?php echo get_template_directory_uri(); ?>/form_action.php" method="post" id="main_form">
							<label for="name">Имя:</label>
							<input type="text" name="name" id="name" placeholder="Введите имя" required/>
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" placeholder="Введите email" required/>
							<label for="subject">Тема:</label>
							<input type="text" name="subject" id="subject" placeholder="Введите тему письма" required/>
							<label for="message">Сообщение:</label>
							<textarea name="message" id="message" placeholder="Введите сообщение" required></textarea>
							<input type="submit" name="submit" class="submit_btn left" value="Отправить"/>
							<input type="reset" class="submit_btn right" value="Отменить"/>
						</form>
					</section>
				</div>
			</div>

			<?php get_sidebar('left'); ?>
		</div>

<?php get_footer(); ?>