		 		</v-container>
    	</v-content>
		 </main>
		</v-app>
		<v-footer>
		  <div class="text-xs-right">{{ themeName }} © <?php echo date('Y'); ?></div>
		</v-footer>
	</div> <!-- End #app - Vue attachment -->
		<script src="<?php bloginfo( 'template_url' ); ?>/dist/scripts/main.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>