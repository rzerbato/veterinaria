<?php
$this->breadcrumbs=array(
	'Sub Rubros'=>array('admin'),
	'Administrar',
);

$this->menu=array(
array('label'=>'<i class="fa fa-plus fa-fw"></i> Crear Subrubro','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('sub-rubro-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Subrubros</h1>

<p>
	Opcionalmente puedes utilizar operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
		or <b>=</b>) al incio de cada campo de búsqueda para especificar cómo se debe realizar la comparación.
	</p>


<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" >
	<?php $this->renderPartial('_search',array(
	'model'=>$model, 'modelRubro'=>$modelRubro,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'sub-rubro-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type' => 'striped bordered condensed',
'template' => "{summary}{items}{pager}",
'columns'=>array(
		//'idSubRubro',
		//'rubro_idRubro',
		array (
			'name'=>'rubro_idRubro',
			'value'=>'$data->rubroIdRubro->nombre',
			'type'=>'text',
			'htmlOptions'=>array('style'=>'width: 25%'),
		),
		'nombre',
		//'estado',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
