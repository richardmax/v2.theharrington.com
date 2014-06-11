<?php
/**
 * Download button
 */

global $dlm_download, $download_monitor;
?>
<p><a class="aligncenter download-button" href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow" target="_blank">
	<?php printf( __( 'Download &ldquo;%s&rdquo;', 'download_monitor' ), $dlm_download->get_the_title() ); ?>
	<small><?php $dlm_download->the_filename(); ?> &ndash; <?php $dlm_download->the_filesize(); ?></small>
</a></p>