<script type="text/javascript">
	$(document).ready(function(){
		$("#j-peng").addClass("active");
	});
</script>
<div class="row-fluid">
    <h2>Test SVM</h2>
	<?php
		echo $this->Form->create('Pages', array(
			'inputDefaults' => array(            
				'label' => false,            
				'div' => false,
				)	
			)
		); 
	?>
	<?php echo $this->Form->input('sentence',array('type' =>'textarea','class' => 'input-big','placeholder' => 'type here..')); ?>	
	<button type="submit" class="btn btn-primary">Analysis</button>
	<?php echo $this->Form->end(); ?>    
</div>
<div class="row-fluid">
    <?php if(isset($kesimpulan)):?>
		<div class="alert alert-info">
		<?php print_r($lines[0]);?>
		</div>
		<div class="alert alert-success">
			<b>Prediksi : <?php echo $kesimpulan;?></b>
		</div>
	<?php endif;?>

</div>