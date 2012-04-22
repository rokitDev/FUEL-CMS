<div id="filters">
	<table border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td>
					<?php if (!empty($more_filters)) : ?>
					<?=$more_filters?>
					<?php endif; ?>
				</td>
				<td><a href="<?=fuel_url($this->module_uri.'/reset_page_state', FALSE)?>" class="reset"></a></td>
				<td><?=$this->form->search('search_term', $params['search_term'], 'placeholder="'.lang('label_search').'"')?> </td>
				<td class="search"><?=$this->form->submit(lang('btn_search'), 'search')?></td>
				<td class="show"><label for="limit"><?=lang('label_show')?></label> <?=$this->form->select('limit', $this->limit_options, $params['limit'])?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="buttonbar" id="action_btns">

	<ul>
	<?php if ($this->fuel->auth->module_has_action('create')) : ?>
		<?php 
		$create_url = (!empty($this->model->filters['group_id'])) ? $this->module_uri.'/create/'.$this->model->filters['group_id'] : $this->module_uri.'/create';
		if (!empty($tree)) : ?>
		<li class="active"><a href="#" id="toggle_list" class="ico ico_table" title="<?=$keyboard_shortcuts['toggle_view']?> to toggle view"><?=lang('btn_list')?></a></li>
		<li><a href="#" id="toggle_tree" class="ico ico_tree" title="<?=$keyboard_shortcuts['toggle_view']?> to toggle view"><?=lang('btn_tree')?></a></li>
		<?php endif; ?>
		<?php if (!empty($this->list_actions)) : ?>
			<?php 
			foreach($this->list_actions as $action => $label) : 
			$lang_key = str_replace('/', '_', $action);
			?>
			<li><?=anchor(fuel_url($action), $label, array('class' => 'ico ico_'.$lang_key))?></li>
			<?php endforeach; ?>
		<?php endif; ?>
		<li><a href="#" class="ico ico_precedence" id="rearrange"><?=lang('btn_rearrange')?></a></li>

		<li><a href="#" class="ico ico_select_all"><?=lang('btn_select_all')?></a></li>

		<?php if ($this->exportable AND $this->fuel->auth->has_permission($this->permission, 'export')) : ?>
			<li><a href="<?=fuel_url($this->module_uri.'/export')?>" class="ico ico_export" id="export_data"><?=lang('btn_export_data')?></a></li>
		<?php endif; ?>
		<?php if ($this->fuel->auth->module_has_action('delete') && $this->fuel->auth->has_permission($this->permission, 'delete')) : ?>
		<li><a href="#" class="ico ico_delete" id="multi_delete"><?=lang('btn_delete_multiple')?></a></li>
		<?php endif; ?>
		<li><a href="<?=fuel_url($create_url)?>" class="ico ico_create"><?=$this->create_action_name?></a></li>
	<?php endif; ?>
	</ul>
	
	
</div>
<?php if (!empty($params['view_type'])) : ?>
<?=$this->form->hidden('view_type', $params['view_type'])?>
<?php endif; ?>
