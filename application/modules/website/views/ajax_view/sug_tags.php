<?php if(count($suggetion)>0){ ?>

	<?php foreach($suggetion as $s){ ?>
	    <div class="form-check form-check-inline">
	        <input class="form-check-input" type="checkbox" id="inlineCheckbox2<?=$s->id?>" value="<?=$s->tag?>">
	        <label class="form-check-label" for="inlineCheckbox2<?=$s->id?>"><?=$s->tag?></label>
	    </div>
	<?php } ?>

<?php }else{ ?>

	<span>No data found</span>

<?php } ?>